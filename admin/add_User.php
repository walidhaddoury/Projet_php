<div class="form_signIn">
    <form class="form" action="?p=handle_add_User" method="POST">
        <div class="place">
            <input name="username" class="name input" type="text" placeholder="Identifiant">
        </div>
        <div class="place">
            <input name="password" class="password input" type="password" placeholder="Mot de passe">
        </div>
        <div class="place">
            <input name="cPassword" class="password input" type="password" placeholder="Confirmation mot de passe">
        </div>
        <div class="place">
            <input name="email" class="mail input" type="text" placeholder="E-mail">
        </div>
        <div class="place">
            <input name="role" class="role input" type="text" placeholder="role">
        </div>
        <div id="button_form">
            <button type="button" class="button" OnClick="window.location.href='?p=logIn'">Annuler</button>
            <button class="button" type="submit">Valider</button>
        </div>
    </form>
</div>