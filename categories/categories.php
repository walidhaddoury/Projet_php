<?php
require_once("init.php");
?>

<div class='button_categorie'>
    <form action="" method="POST">
        <?php
        $query = $db->prepare('SELECT * FROM categorie');
        $query->execute();
        $datas = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($datas as $element) :
        ?>
            <button class='button_admin categorie' type="submit" value="<?= $catToFind = $element['intitule'] ?>" name="categorieFind"><?= ucfirst($element['intitule']) ?></button>

        <?php endforeach; ?>
    </form>
</div>

<div class='product_find'>

    <?php

    if (isset($_POST["categorieFind"])) {
        $query = $db->prepare('SELECT * FROM categorie_product CP, categorie C, product P WHERE P.id = CP.idProduct AND CP.idCategorie = C.id AND C.intitule = "' . $_POST["categorieFind"] . '"');
        $query->execute();
        $datas = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($datas as $element):
    ?>
        <div class='course__item'>
            <figure class='course_img'>
                <i class="fas fa-tags fa-5x"></i>
            </figure>
            <div class='info__card'>
                <h4><?= ucfirst($element['intitule']) ?></h4>
                <p>
                    <span class='discount'><?= $element['prix'] ?> €</span>
                </p><br>
                <p><?= ucfirst($element['description']) ?></p><br>
                <button class='add-to-cart' data-id='1'><i class='fa fa-cart-plus'></i>Ajouter au panier</button>
            </div>
        </div>
    <?php endforeach; } ?>

</div>