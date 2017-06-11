
<div class="logged-in-container">
    <form action="/webshop-HAN/logout.php" method="post">
        <label for="">Welkom, <?php echo $_SESSION['user']->GEBRUIKERSNAAM; ?> </label>

        <input type="submit" value="Uitloggen">
    </form>
</div>