
    <div class="contact_form--text">
        <h3>Une question? Un devis?</h3>
        <p> Laissez-moi votre message et je vous recontacterais pour trouver une solution adaptée à vos besoins.</p>
    </div>
    <form action="./admin/contact_handler.php" class="contact_form" method="post" target='empty'> 

        <div class="contact_form--child">
            <label for="sujet" class='sujet'>Nom :</label>
            <input type="text" id="sujet" name="user_firstname">
      
            <label for="sujet" class='sujet'>Prénom :</label>
            <input type="text" id="sujet" name="user_name">
      
            <label for="mail">Votre mail :</label>
            <input type="email" id="mail" name="user_mail" >
        </div>

        <div class="contact_form--child--2">
            <label for="sujet" class='sujet'>Sujet :</label>
            <input type="text" id="sujet" name="user_sujet">

            <label for="msg">Message :</label>
            <textarea id="msg" name="user_message" placeholder="Rédiger votre message dans ce champ.."></textarea>
            <span  class='button'> <button type="submit">Envoyer le message</button></span>
            <iframe name="empty" id="empty" style="display: none;"></iframe>
        </div>
      
    </form>
 
</div>
