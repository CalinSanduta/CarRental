<?php

require_once 'Framework/Controleur.php';
require_once 'Modele/Avis.php';
require_once 'Framework/Vue.php';

class ControleurAvis extends Controleur
{
    private $avis;

    public function __construct()
    {
        $this->avis = new Avis();
    }

    // Implémentation requise (Controleur::index est abstraite)
    public function index()
    {
        $this->rediriger('Voitures', 'index');
    }

    // Ajoute un avis à une voiture
    public function ajouter()
    {
        // 1) ID de la voiture : via URL (/Avis/ajouter/{id}) ou hidden 'voiture_id'
        if ($this->requete->existeParametre('id')) {
            $voitureId = (int) $this->requete->getParametreId('id');
        } else {
            $voitureId = (int) $this->requete->getParametreId('voiture_id');
        }

        // 2) (Optionnel) Vérifier le courriel si tu gardes ce champ
        $auteur = $this->requete->getParametre('auteur');
        if (!filter_var($auteur, FILTER_VALIDATE_EMAIL)) {
            $this->requete->getSession()->setAttribut('erreur', 'courriel');
            $this->rediriger('Voitures', 'lire/' . $voitureId);
            return;
        }

        // 3) Récupérer l'id utilisateur si connecté, sinon NULL (avis invité)
        $session = $this->requete->getSession();
        $utilisateurId = null;

        if ($session->existeAttribut('idUtilisateur')) {
            $utilisateurId = (int) $session->getAttribut('idUtilisateur');
        } elseif ($session->existeAttribut('utilisateur')) {
            $u = $session->getAttribut('utilisateur');
            if (is_array($u)) {
                $utilisateurId = $u['id'] ?? $u['ID'] ?? $u['utilisateur_id'] ?? $u['UTIL_ID'] ?? null;
            } elseif (is_object($u)) {
                $utilisateurId = $u->id ?? $u->ID ?? $u->utilisateur_id ?? $u->UTIL_ID ?? null;
            }
            if ($utilisateurId !== null) {
                $session->setAttribut('idUtilisateur', (int) $utilisateurId);
            }
        }
        // NB: $utilisateurId peut rester NULL si avis invité (assure-toi que la colonne l’accepte)

        // 4) Contenu de l'avis (champ 'commentaire' attendu par le modèle)
        $commentaire = $this->requete->getParametre('commentaire');

        // 5) Insertion
        $this->avis->setAvis([
            'voiture_id'     => $voitureId,
            'utilisateur_id' => $utilisateurId, // peut être NULL
            'commentaire'    => $commentaire,
        ]);

        // 6) Retour sur la page de la voiture
        $this->rediriger('Voitures', 'lire/' . $voitureId);
    } // <-- FERMETURE de la méthode ajouter()

    // Affiche la page de confirmation de suppression
    public function confirmer()
    {
        $id   = $this->requete->getParametreId('id');
        $avis = $this->avis->getUnAvis($id);
        $this->genererVue(['avis' => $avis]);
    }

    // Soft delete
    public function supprimer()
    {
        $id   = $this->requete->getParametreId('id');
        $avis = $this->avis->getUnAvis($id); // récupère voiture_id
        $this->avis->deleteAvis($id);
        $this->rediriger('Voitures', 'lire/' . $avis['voiture_id']);
    }

    // Rétablir un avis
    public function retablir()
    {
        $id   = $this->requete->getParametreId('id');
        $avis = $this->avis->getUnAvis($id); // récupère voiture_id
        $this->avis->restoreAvis($id);
        $this->rediriger('Voitures', 'lire/' . $avis['voiture_id']);
    }
}
