<?php include('header.php'); ?>


 <div class="hero-unit">
    <form method="post" action="create.php">
       <p>Enter Long URL Here* <input type="text" name="url" size="50" value="http://"  /><br />
		Input a Short Tag Here <input type="text" name="tag" size="15" value="" /><br />
       <input class="btn btn-primary btn-success" type="submit" name="send" value="Make It Short!" class="submit" /></p>
    </form>
</div>

<?php include('footer.php'); ?>