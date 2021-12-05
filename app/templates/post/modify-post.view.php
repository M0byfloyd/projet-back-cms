<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="email" class="form-control" id="exampleInputEmail1" value="<?= $post->getTitle() ?>" aria-describedby="emailHelp" placeholder="Nouveau titre">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Contenu</label>
        <input class="form-control" value="<?= $post->getContent() ?>" id="exampleFormControlTextarea1" name="content">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>