
/// Récupération du formulaire. Fonction conditionnant sa validation ///
document.getElementById("formulaire").addEventListener("submit", function(e) 
{

    /// L'action par défaut n'a pas lieu si les conditions ne sont pas remplies ///
    e.preventDefault();
    
    /// Une variable "noValid" est déclarée. Son contenu sera adapté aux différents champs du formulaire ///
    var noValid;

    /// Récupération dans des différentes variables des champs successifs du formulaire ///
    var leNom = document.getElementById("nom");
    var lePrenom = document.getElementById("prenom");
    var laDate = document.getElementById("datenaissance");
    var leCode = document.getElementById("postal");
    var lAdresse = document.getElementById("adresse");
    var laVille = document.getElementById("ville");
    var leMail = document.getElementById("mail");
    var leSujet = document.getElementById("sujet").value;
        console.log(leSujet);
    var laQuestion = document.getElementById("question");
    
    /// Variables pour tester les expressions régulières dans certains champs ///
    var regexNom = /^[a-zA-Z-éèçëê\s]+$/;
    var regexDate = /^([0-9][0-9])+\/([0-9][0-9])+\/([0-9][0-9][0-9][0-9])+$/;
    var regexPostal = /^[0-9]{5}$/;
    var regexVille = /^[a-zA-Z-éèçëê\s]+$/;
    var regexMail = /^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/

    /// Les conditions vérifient pour tous les champs qu'ils ne sont pas vides ///
    
    /// Vérification que le nom et le prénom ne contiennent que des lettres et des tirets ///
    if (regexNom.test(leNom.value) == false)
    {
        noValid = "Saisissez un nom (seulement des lettres et des tirets)";
        document.getElementById("noNom").innerHTML = noValid;
    }

    if (regexNom.test(lePrenom.value) == false)
    {
        noValid = "Saisissez un prénom (seulement des lettres et des tirets)";
        document.getElementById("noPrenom").innerHTML = noValid;
    }

    /// Vérification que le formation de la date est correct ///
    if (regexDate.test(laDate.value) == false)
    {
        noValid = "Saisissez une date de naissance (jour/mois/année)";
        document.getElementById("noDate").innerHTML = noValid;
    }
    
    /// Vérification que le code postal contient bien 8 chiffres, selon l'usage en France ///
    if (regexPostal.test(leCode.value) == false)
    {
        noValid = "Saisissez un code postal (5 chiffres)";
        document.getElementById("noPostal").innerHTML = noValid;
    }

    /// Pour l'adresse, l'utilisateur peut saisir tous les caractères de son choix ///
    if (lAdresse.value == "")
    {
        noValid = "Saisissez une adresse";
        document.getElementById("noAdresse").innerHTML = noValid;
    }   

    /// Vérification que le nom de la ville ne contient que des lettres et des tirets ///
    if (regexVille.test(laVille.value) == false)
    {
        noValid = "Saisissez une ville (seulement des lettres et des tirets)";
        document.getElementById("noVille").innerHTML = noValid;
    }

    /// Vérification des règles appliquées aux adresses mail: @ obligatroire, pas de caractères spéciaux, d'accents..., présence d'un . et d'une extension à la fin...///
    if (regexMail.test(leMail.value)== false)
    {
        noValid = "Saisissez une adresse mail valide";
        document.getElementById("noMail").innerHTML = noValid;
    }

    /// Vérification que l'utilisateur à bien choisi un des 4 sujets présents dans la liste déroulante, sous le "Veuillez sélectionner..."", et à l'exclusion de celui-ci ///
    if (leSujet == "Veuillez sélectionner un sujet")
    {    
        noValid = "Choisissez un sujet";
        document.getElementById("noSujet").innerHTML = noValid;
    }   
    
    /// Vérification qu'une question a bien été posée dans le textarea ///
    if (laQuestion.value == "")
    {
        noValid = "Saisissez votre question";
        document.getElementById("noQuestion").innerHTML = noValid;
    }

    /// Si tous les conditions sont remplies, une alerte avertit que le formulaire a été envoyé///

    else{
        alert("formulaire envoyé!")
    }
})
