# Système de Collecte de Données - Lancement Exclusif

## 📋 Vue d'ensemble

Ce système collecte et enregistre les informations des visiteurs de manière **conforme au RGPD** :
- Adresse IP publique
- Date et heure d'accès
- Informations du navigateur
- Identifiant unique de session

**100% JavaScript + JSON** - Pas de PHP requis ! ⚡

## 🏗️ Architecture

### Fichiers créés

1. **index.html** - Page principale avec :
   - Modal RGPD avec mentions légales complètes
   - Collecte de l'IP via API ipify
   - Enregistrement automatique des visites en localStorage
   - Footer avec lien vers les conditions RGPD
   - Fonctions JS pour exporter les données

2. **admin.html** - Tableau de bord d'administration :
   - Affichage des statistiques (total visites, IPs uniques, dernière visite)
   - Tableau complet des visites
   - Visualisation JSON brute
   - Export en JSON
   - Suppression des données

3. **visits.json** - Fichier d'exemple avec la structure des données

4. **data_structure.json** - Documentation de la structure des données

## 🚀 Installation et utilisation

### Configuration minimale

Aucune configuration serveur requise ! Ouvrir simplement :
- `index.html` - Page publique
- `admin.html` - Panneau d'administration

### En développement local

Les données sont stockées automatiquement dans `localStorage` du navigateur.

**Pour voir les données :**

Dans la console du navigateur (F12), taper :
```javascript
// Voir les données
viewVisitsData()

// Exporter en JSON
exportVisitsData()
```

Ou utiliser le panneau admin (admin.html) pour :
- 📊 Voir les statistiques
- 📋 Consulter le tableau des visites
- 👁️ Afficher le JSON brut
- ⬇️ Télécharger les données en JSON
- 🗑️ Effacer les données

## 📊 Structure des données JSON

```json
{
  "sessionId": "sess_1715517000000_abc123def",
  "ip": "203.0.113.45",
  "timestamp": "2026-05-12T15:10:00.000Z",
  "userAgent": "Mozilla/5.0...",
  "referrer": "direct",
  "language": "fr-FR"
}
```

## 🔒 Conformité RGPD

### ✅ Mesures implémentées

- **Consentement explicite** : Modal RGPD au chargement
- **Transparence** : Informations complètes sur la collecte
- **Durée de rétention** : 90 jours maximum (nettoyage automatique en JS)
- **Droits des utilisateurs** : Affichage des droits RGPD
- **LocalStorage** : Enregistrement du consentement et des données

### 📋 Points clés du RGPD

- **Base légale** : Article 6.1.a (consentement)
- **Finalités** : Analyse, amélioration UX, obligations légales
- **Données** : Adresse IP, timestamp, identifiant session
- **Conservation** : 90 jours (nettoyage auto JS)
- **Droits** : Accès, rectification, effacement, portabilité, opposition

## 📋 Fonctions JavaScript disponibles

### Dans la console du navigateur principal :

```javascript
// Voir toutes les visites enregistrées
viewVisitsData()

// Exporter les données en fichier JSON
exportVisitsData()
```

### Données stockées :

- `localStorage.getItem('visits')` - Tableau JSON des visites
- `localStorage.getItem('rgpdConsent')` - Consentement RGPD

## 🛡️ Recommandations de sécurité

1. **HTTPS obligatoire** en production
2. **Masquer l'admin.html** ou la protéger par mot de passe en production
3. **Backup réguliers** des données (télécharger le JSON)
4. **IP masquée** en affichage publique (ex: 203.0.113.xxx)
5. **Limiter l'accès** à admin.html via authentification
6. **Nettoyer régulièrement** les anciennes données (> 90 jours)

## 🔄 Flux de fonctionnement

```
1. Utilisateur charge index.html
   ↓
2. JavaScript affiche modal RGPD
   ↓
3. Utilisateur accepte/refuse
   ↓
4. IP fetchée via api.ipify.org
   ↓
5. Données enregistrées en localStorage (JSON)
   ↓
6. Nettoyage automatique (>90 jours)
   ↓
7. Footer affiche lien "Politique RGPD"
```

## 📤 Export des données

### Automatique :
- Cliquer sur "Télécharger JSON" dans admin.html
- Ou console : `exportVisitsData()`

### Format :
```json
[
  {
    "sessionId": "sess_...",
    "ip": "203.0.113.45",
    "timestamp": "2026-05-12T15:10:00.000Z",
    "userAgent": "Mozilla/5.0...",
    "referrer": "direct",
    "language": "fr-FR"
  }
]
```

## ⚙️ Personnalisation

### Modifier la durée de rétention (90 jours) :

Dans `index.html`, fonction `recordVisit()` :
```javascript
const ninetyDaysAgo = Date.now() - (90 * 24 * 60 * 60 * 1000);
// Changer 90 par le nombre de jours souhaité
```

### Changer l'API IP :

Remplacer l'URL dans `getIPAddress()` :
```javascript
return fetch('https://api.ipify.org?format=json')
```

Options :
- `https://api.ipify.org?format=json`
- `https://ip.seeip.org/json`
- `https://ipapi.co/json/`

## 📝 Admin Panel

Ouvrir `admin.html` pour accéder à :

- **Statistiques** : Nombre de visites, IPs uniques, dernière visite
- **Tableau** : Liste complète des visites avec IP, date, langue, navigateur
- **JSON Viewer** : Affichage formaté des données brutes
- **Export** : Télécharger les données en JSON
- **Effacer** : Supprimer toutes les données (avec confirmation)

## 🔐 LocalStorage vs Serveur

### ✅ Avantages du localStorage :
- Pas de serveur PHP requis
- Données privées (stockées localement)
- Facile à exporter
- Rapide et simple

### ⚠️ Limitations :
- Les données sont perdues si on vide le cache
- Limite de ~5-10 MB par domaine
- Un seul utilisateur = une seule source de vérité (son navigateur)

### Recommandation :
Télécharger régulièrement le JSON pour garder une archive !

## 📞 Support RGPD

Pour des questions RGPD, consulter :
- https://www.cnil.fr/
- https://gdpr-info.eu/

---

**Version** : 2.0 (JavaScript pur)
**Dernière mise à jour** : 2026-05-12
