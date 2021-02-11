<div class="form_signIn">
    <form class="form" action="?p=handle_add_Product" method="POST">
        <div class="place">
            <input name="categorie" class="categorie input" type="text" placeholder="Catégorie">
        </div>
        <div class="place">
            <input name="intitule" class="intitule input" type="text" placeholder="Nom du produit">
        </div>
        <div class="place">
            <input name="prix" class="prix input" type="number" placeholder="Prix">
        </div>
        <div class="place">
            <input name="description" class="description input" type="text" placeholder="Description">
        </div>
        <div id="button_form">
            <button type="button" class="button" OnClick="window.location.href='?p=logIn'">Annuler</button>
            <button class="button" type="submit">Valider</button>
        </div>
    </form>
</div>