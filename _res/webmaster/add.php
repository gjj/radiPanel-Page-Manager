<?php

	if( !preg_match( "/index.php/i", $_SERVER['PHP_SELF'] ) ) { die(); }

	if( $_GET['id'] ) {

		$id = $core->clean( $_GET['id'] );
        	
		$query = $db->query( "SELECT * FROM _pages WHERE id = '{$id}'" );
		$data  = $db->assoc( $query );
        	
		$editid = $data['id'];
        	
		$oldPg	= $data['page'];
					
		$query4	= $db->query( "SELECT * FROM menu WHERE resource = '_res/_pages/$oldPg'" );
		$array4	= $db->assoc( $query4 );
        	
	}
	
?>
<script type="text/javascript" src="/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	
<script type="text/javascript">
tinyMCE.init({
        // General options
        mode : "textareas",
        theme : "advanced",
        plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Skin options
        skin : "o2k7",
        skin_variant : "silver",

        // Example content CSS (should be your site CSS)
        content_css : "css/example.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "js/template_list.js",
        external_link_list_url : "js/link_list.js",
        external_image_list_url : "js/image_list.js",
        media_external_list_url : "js/media_list.js",

	apply_source_formatting : "true",
        // Replace values for the template plugin
        template_replace_values : {
                username : "Some User",
                staffid : "991234"
        }
});
</script>
		
<form action="" method="post" id="addFile">

	<div class="box">

		<div class="square title">
			<strong>Create New Content Page</strong>
		</div>

		<?php

			if( $_POST['submit'] ) {

				try {
				
					$text		= $core->clean( $_POST['text'] );
					$pgName		= $core->clean( $_POST['page'] );
					$url		= $core->clean( $_POST['url'] );
					$ugroup		= $core->clean( $_POST['ugroup'] );
					$content	= $core->clean( $_POST['content'] );
				
					
					if( !$page or !$content or !$url ) {

						throw new Exception( "error_missing_fields" );

					}
					else {
						if ( $editid ) {
						
							$db->query( "UPDATE _pages SET page = '{$pgName}', content = '{$content}' WHERE id = '{$editid}'" );
							
							$old	= "/home/jiajiann/public_html/extranet/_res/_pages/" . $data['page'];
							$file	= "/home/jiajiann/public_html/extranet/_res/_pages/" . $pgName;
							
							rename( $old, $file );
							$page->modifyPage( $file, $pgName );
							
							$query2 = $db->query( "SELECT * FROM menu WHERE usergroup = '{$ugroup}' ORDER BY weight DESC LIMIT 1" );
							$array2 = $db->assoc( $query2 );
							
							$db->query( "UPDATE menu SET text = '{$text}', url = '{$url}', resource = '_res/_pages/" . $pgName . "', usergroup = '{$ugroup}', protected = '0', hidden = '0' WHERE resource = '_res/_pages/" . $oldPg . "'" );
							
						}
						
						else {

							$db->query( "INSERT INTO _pages VALUES (NULL, '{$pgName}', '{$content}')" );
							
							$file	= "/home/jiajiann/public_html/extranet/_res/_pages/" . $pgName;
							$page->createPage( $file, $pgName );
							
							$query2 = $db->query( "SELECT * FROM menu WHERE usergroup = '{$ugroup}' ORDER BY weight DESC LIMIT 1" );
							$array2 = $db->assoc( $query2 );

							$weight = $array2['weight'] + 1;

							$db->query( "INSERT INTO menu VALUES (NULL, '{$text}', '{$url}', '_res/_pages/" . $pgName . "', '{$ugroup}', '0', '{$weight}', '0');" );
							
							
						}
						
						echo "<div class=\"square good\">";
						echo "<strong>Success</strong>";
						echo "<br />";
						echo "Added a new page!";
						echo "</div>";

					}

				}
				catch( Exception $e ) {

					echo "<div class=\"square bad\">";
					echo "<strong>Error</strong>";
					echo "<br />";
					echo $e->getMessage();
					echo "</div>";

				}

			}

		?>
		<table width="100%" cellpadding="3" cellspacing="1">
			<?php
			
				$query3 = $db->query( "SELECT * FROM usergroups" );

				while( $array3 = $db->assoc( $query3 ) ) {

					if( $array3['id'] == $data['usergroup'] ) {

						$ugroups[$array3['id'] . '_active'] = $array3['name'];

					}
					else {

						$ugroups[$array3['id']] = $array3['name'];

					}
				
				}
				
				echo $core->buildField( "text",
										"required",
										"text",
										"Menu Name",
										"The name of your menu item.",
										stripslashes( $array4['text'] ) );
										
				echo $core->buildField( "text",
										"required",
										"page",
										"Filename",
										"Remember to append .php!",
										stripslashes( $data['page'] ) );
										
				echo $core->buildField( "text",
										"required",
										"url",
										"Page URL",
										"The menu's URL (usergroup.page).",
										stripslashes( $array4['url'] ) );
                                        					
				echo $core->buildField( "select",
										"required",
										"ugroup",
										"Usergroup",
										"The usergroup for the page.",
										$ugroups );

				
				echo $core->buildField( "textarea",
										"required",
										"content",
										"Page Content",
										"Page Content",
										stripslashes( $data['content'] ) );

			?>
		</table>
	</div>
	
	<div class="box" align="right">

		<input class="button" type="submit" name="submit" value="Submit" />

	</div>

</form>

<?php
	echo $core->buildFormJS('addFile');
?>