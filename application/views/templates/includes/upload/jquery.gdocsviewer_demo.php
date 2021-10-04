
<script src="<?php print base_url('assets/js/jquery.gdocsviewer.min.js') ;?>"></script>

<style type="text/css">
/* Style the second URL with a red border */
#test-gdocsviewer {
	border: 5px red solid;
	padding: 20px;
	width: 650px;
	background: #ccc;
	text-align: center;
}
/* Style all gdocsviewer containers */
.gdocsviewer {
	margin:10px;
}
</style>
<script type="text/javascript"> 
/*<![CDATA[*/
$(document).ready(function() {
	$('a.embed').gdocsViewer({width: 600, height: 750});
	$('#embedURL').gdocsViewer();
});
/*]]>*/
</script> 

<div style="background:#999; font-family:arial, helvetica, sans-serif; font-size:14px;">
<div style="background:#fff; width:960px; margin:0 auto; padding:20px;">
	<h1>gDocsViewer jQuery plugin v1.0 Demo</h1>
	<div>
	<p>By <a href="http://www.jawish.org/">Jawish Hameed</a></p>

	<p>See <a href="http://www.jawish.org/blog/archives/394-Google-Docs-Viewer-plugin-for-jQuery.html" target="_blank">documentation and usage guide</a></p>
	
	</div>
	<hr size="1" />
	<div>
		<h2>Examples</h2>
		<h3>URLs with class: embed</h3>
		<a href="http://finaid.georgetown.edu/sample.pdf" class="embed">PDF test georgetown.edu</a>
		<a href="http://plugindoc.mozdev.org/testpages/test.pdf" class="embed" id="test">PDF at mozdev.org</a>

		<h3>URLs with id: embedURL</h3>
		<a href="http://samplepdf.com/sample.pdf" id="embedURL">Sample PDF at samplepdf.com</a>
	</div>
</div>
</div>
<div class="panel-footer">
	<div class="footer" style="height: 15px"> <p class="pull-right">Powered By <a href="#">NetronIT &copy<?php echo date('Y');?></p></div>
</div>

<script src="<?php print base_url('assets/js/jquery.js') ;?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php print base_url('assets/js/bootstrap.min.js') ;?>"></script>
<script type="text/javascript" src="<?php print base_url('assets/js/plugins/jquery/jquery-ui.min.js') ;?>"></script>


<!-- Morris Charts JavaScript -->
<script src="<?php print base_url('assets/js/plugins/morris/raphael.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris.min.js') ;?>"></script>
<script src="<?php print base_url('assets/js/plugins/morris/morris-data.js') ;?>"></script>