<legend>Remote Product 	Asset</legend>

<div  id='products_row'   >
	<div></div>
</div>

<br />
<br />

<?php $this->load->view($tags_container); ?>


<div  class='oh clearfix' >
	<form  id='product_asset_form' class="form-horizontal" method="post" accept-charset="utf-8">
	  <fieldset>
			<div class="control-group">
				<label class="control-label">Edit Mode</label>
				<div class="controls">
				  <label class="radio">
				    <input type="radio" name="editmode" id="insertmode" value="insert" checked>
				    Insert
				  </label>
				  <label class="radio">
				    <input type="radio" name="editmode" id="editmode" value="edit">
				    Update
				  </label>
				</div>
			</div>
			<div class="control-group">
			  <label class="control-label" for="input01">URL</label>
			  <div class="controls">
			    <input type="text" class="input-xlarge"  id="url" name="url" placeholder="http:flickr.com/image.jpg">
			    <p class="help-block">i.e.  http://www.flickr.com/image.jpg</p>
			    <button type="button" class="btn">Submit</button>
			  </div>
			</div>
	  </fieldset>
	</form>	
</div>
<div  class='oh '>
	<img  id='picture'  src="http://placehold.it/270x300">
</div>