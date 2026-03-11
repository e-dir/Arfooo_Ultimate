
# Arfooo Ultimate

![Bannière Arfooo Ultimate](https://www.e-dir.fr/arfooo_ultimate/arfooo_ultimate_header.png)

**Arfooo Ultimate** est une version modifiée avec de nouvelles fonctionnalités basées sur la version 2.0.2 du célèbre CMS Arfooo : nous tenons à remercier les créateurs de ce CMS. Celui-ci n’étant plus mis à jour et les différents critères SEO ayant évolués depuis, e-DiR à mis à jour ce script d’annuaire en y apportant quelques modifications pour le rendre le plus SEO friendly avec la modification des ancres de sorties (url brut) et la limitation du nombre de liens sortants (liens sortants uniquement sur la fiche : le lien sortant est enlevé dans les catégories).

---

## 📊 Comparatif des Fonctionnalités

| Fonctionnalité | Arfooo 2.0.2 | Arfooo Ultimate |
| :--- | :---: | :---: |
| Compatible PHP 5.3, 5.4, 5.5, 5.6 et PHP 7 ! | ❌ | ✅ |
| Titre SEO | ❌ | ✅ |
| Meta description | ❌ | ✅ |
| SEO friendly | ❌ | ✅ |
| Structure HTML cohérente | ❌ | ✅ |
| Responsive design (thème par défaut) | ❌ | ✅ |
| Optimisation du PageSpeed | ❌ | ✅ |
| Nouveaux sites sur la home | ❌ | ✅ |
| Bouton réseaux sociaux dans les fiches | ❌ | ✅ |
| Description complète envoyée par mail | ❌ | ✅ |
| H2 et H3 disponible dans l’éditeur | ❌ | ✅ |
| Linksculting cohérent | ❌ | ✅ |
| Rich Snippets | ❌ | ✅ |

---

L’installation se fait comme sur les anciennes version d’Arfooo via l’archive que nous mettons à votre disposition.

Si vous avez besoin d’un template exclusif ou d’une mise à jour vers Arfooo Ultimate à partir d’un Arfooo de base vous pouvez prendre contact avec nous avec ce [formulaire](https://www.e-dir.fr/#colophon) : nous répondrons à toutes vos questions.

## 📥 Téléchargement


### Change log 1.1 -> 1.2
* Compatible avec PHP 8.4
* Ajout d'un fichier pour migrer de Arfooo à la version Ultimate, "/install/update/update_arfooo_to_ultimate.php" : suivre la procédure de mise à jour

### Change log 1.0 -> 1.1
* Compatible avec PHP 7
* Nouveau thème par défaut : Optimisé pour mobile, optimisé pour le pagespeed, ajout des rich snippets pour les commentaires (note visible sur les recherches Google), beaucoup de bugs réglés et d’autres nouveautés à découvrir !
* Souci des soumissions des sites en https : OK
* Souci avec Google map : OK (il faut ajouter votre api key : `/components/GoogleMap.php`)

### [Télécharger Arfooo Ultimate 1.1](https://www.e-dir.fr/arfooo_ultimate/arfooo_ultimate_1.1.zip)

![Arfooo Ultimate Illustration](https://www.e-dir.fr/arfooo_ultimate/arfooo_ultimate.jpg)

### Procédure de mise à jour (depuis Arfooo Ultimate 1.0)
**Avant une mise à jour pensez à faire une sauvegarde complète de votre annuaire : fichiers et db et à la suite de la mise à jour ne pas oublier de vider le cache.**

Tout effacer sauf : .htaccess, le dossier upload, templates ( si le template n'est pas d'origine ), le fichier db.php dans le dossier config.
Upload les nouveaux fichier/dossier, vider le cache dans l'administration ou en supprimant le contenu des dossiers : cache et compiled.
Après cela un rafraichissement est votre Arfooo est à jour !

### Procédure de mise à jour (depuis Arfooo 2.0.2)
Tout effacer sauf : .htaccess, le dossier upload, templates ( si le template n'est pas d'origine ), le fichier db.php dans le dossier config.
Upload les nouveaux fichier/dossier
Executer : "votresite.com/install/update/update_arfooo_to_ultimate.php" pour mettre à jour la base de données
Vider le cache dans l'administration ou en supprimant le contenu des dossiers : cache et compiled.
Après cela un rafraichissement est votre Arfooo est à jour !


	*Si le template n'est pas d'origine :
	/template/arfooo/sitedetails.tpl à remplacer la ligne 22 par :

	{if $site.siteTitleseo != ''}
{include file="includes/header.tpl" title=$site.siteTitleseo metaDescription=$site.sitemeta  includeSearchEngine=true}
{else}
{include file="includes/header.tpl" title=$site.siteTitle includeSearchEngine=true}
	{/if}
	

---

## 📝 Détails des modifications

Voici une liste des modifications apportées avec une illustration lorsque cela est possible :

### SOUMISSION
* Rajout de la page condition avant la page de soumission pour que les règles soient obligatoirement lues.
* Description complète remise dans le mail de confirmation d’un site soumis.
* Formulaire de soumission : tooltip enlevé au profit d’un texte plus lisible, car le webmaster sera obligé d’y prêter attention.
* Choix du titre SEO pour la fiche : il s’agit du titre qui sera affiché sur les moteurs de recherches pour la fiche.
* Choix de la meta description pour la fiche : il s’agit de l’extrait qui sera affiché par les moteurs de recherche.
* Modification de l’éditeur : ajout des balises H2 et H3.

![Nouveau formulaire de soumission](https://www.e-dir.fr/arfooo_ultimate/1.png)

### GLOBAL
* Le script arfooo est maintenant Responsive Design (thème par défaut).
* Optimisation de la vitesse de l’annuaire avec la note Google PageSpeed comme référence + 90 en moyenne (selon l’hébergeur).
* Structure HTML générale de l’annuaire revu avec l’ajout de balise (header, article, nav, footer etc).
* «.html» enlevé et remplacé par «/» dans l’URL de toutes les pages.
* Ajout des liens dans la description sur la page d’attente l’admin.

![Test Mobile](https://www.e-dir.fr/arfooo_ultimate/11.jpg)
![Test Speed](https://www.e-dir.fr/arfooo_ultimate/10.jpg)
![Responsive Design](https://www.e-dir.fr/arfooo_ultimate/9.jpg)
![Ajout liens description admin](https://www.e-dir.fr/arfooo_ultimate/2.png)

### HOME
* Choisir l’affichage ou non des nouveaux sites sur la home via l’onglet configuration de l’admin.
* Choisir le nombre de nouveaux sites à afficher sur la home via l’onglet configuration de l’admin.
* Choisir l’affichage ou non des catégories sur la home via l’onglet configuration de l’admin.
* Choisir l’affichage ou non des sites aléatoire sur la home via l’onglet configuration de l’admin.
* Choisir soi-même les sites aléatoires sur la home via l’onglet configuration de l’admin.

![Options pour la home](https://www.e-dir.fr/arfooo_ultimate/8.png)

### CATÉGORIES
* Liste des catégories (sidebar) dans toutes les catégories et fiche pour un meilleur maillage interne, avant, seul les sous catégories était présentes dans les catégories ce qui limitait les liens vers les catégories principales.
* Le lien direct vers le site est enlevé, un lien uniquement vers la fiche avec le titre de celle-ci.

![Catégories Arfooo Ultimate](https://www.e-dir.fr/arfooo_ultimate/arfooo_ultimate_categories.jpg)

### DÉTAILS
* Remplacement du lien titre par un lien avec URL en bas de fiche.
* Titre seo et meta description personnalisée.
* Bouton des réseaux sociaux G+ / J’aime / Tweet pour un partage de la fiche.
* Backlink et date de validation de la fiche enlevée.

![Page details](https://www.e-dir.fr/arfooo_ultimate/arfooo_ultimate_details.jpg)
![Rich Snippets](https://www.e-dir.fr/arfooo_ultimate/arfooo_rich_snippets.jpg)
![Code source details](https://www.e-dir.fr/arfooo_ultimate/5.png)
