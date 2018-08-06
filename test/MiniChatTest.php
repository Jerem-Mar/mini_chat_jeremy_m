<?php
use PHPUnit\Framework\TestCase;
class MiniChatTest extends TestCase
{
    public function testDeLaRequetePostQuiEnvoiLeMessage() 
    {
        // Instanciation de la connexion à base de données
        include 'include/connexion.php'; 
        // utilisée pour vérifier la présence du message dans la table messages
        $bdd->query('SELECT count()  FROM messages');
        
        // Définition des données POST qui simulent un message
        $req = $bdd->prepare('INSERT INTO messages (pseudo, message) VALUES("Testeur","Ceci est un message de test")');

        
       
        
        // Envoi de la requête POST
        $result = $this->postRequest('', $postData);
        // Si $result vaut "" alors c'est bien : la requête s'est executée

        // Si $result vaut FALSE alors c'est pas bien : la requête a échouée
        // Si $result contient quelque chose ici ( une string remplie ), 
        // c'est forcément une erreur retournée par store.php
        
        // Si $result est vide c'est que la requête POST a bien été envoyée.
        // = store.php n'a renvoyé aucune erreur et donc n'a rien affiché.
        $this->assertEmpty();
        // On vérifie que le message existe bien dans la table messages
        // Pour vérifier que les datas sont identiques
    }



    // Création de la fonction PostRequest()
    private function postRequest($url, $data) 
    {
        $data = $data;
        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => 
                    "Content-type: application/x-www-form-urlencoded\r\n".
                    "User-Agent: "
                ,
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }
}

