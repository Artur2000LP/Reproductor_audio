<?php 
require_once('./config.php');
if (isset($_GET['id']) && $_GET['id'] > 0) {
    $music_id = $_GET['id'];
    $qry = $conn->query("SELECT * FROM `music_list` WHERE id = '{$music_id}' AND delete_flag = 0 ");

    if ($qry->num_rows > 0) {
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=$v;
        }
        // Consulta para obtener el nombre de la categoría según el category_id
        $category_query = $conn->query("SELECT name FROM `category_list` WHERE id = '{$category_id}'");
        if ($category_query->num_rows > 0) {
            $category_data = $category_query->fetch_assoc();
            $category_name = $category_data['name'];
        } else {
            $category_name = "Categoría no encontrada";
        }
    } else {
        echo '<script>alert("Music ID is not valid."); location.replace("./?page=musics")</script>';
    }
} else {
    echo '<script>alert("Music ID is Required."); location.replace("./?page=musics")</script>';
}
?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.music-img{
		width:3em;
		height:3em;
		object-fit:cover;
		object-position:center center;
	}
	img#BannerViewer{
		height: 45vh;
		width: 100%;
		object-fit: scale-down;
		object-position:center center;
		/* border-radius: 100% 100%; */
	}
    .modal-content>.modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <div class="form-group d-flex justify-content-center">
        <img src="<?php echo validate_image((isset($banner_path) ? $banner_path : "")) ?>" alt="" id="BannerViewer" class="img-fluid img-thumbnail bg-dark border-dark">
    </div>
    <div class="form-group">
        <label for="title" class="control-label">Título:</label>
        <div class="pl-4"><?= isset($title) ? $title : "" ?></div>
    </div>
    <div class="form-group">
        <label for="artist" class="control-label">Artista</label>
        <div class="pl-4"><?= isset($artist) ? $artist : "" ?></div>
    </div>
    <div class="form-group">
        <label for="category_id" class="control-label">Categoría</label>
        <div class="pl-4"><?= isset($category_name) ? $category_name : "" ?></div>
    </div>
    <div class="form-group">
        <label for="description" class="control-label">Descripción</label>
        <div class="pl-4"><?= isset($description) ? str_replace("\n", "<br>", html_entity_decode($description)) : "" ?></div>
    </div>
</div>
