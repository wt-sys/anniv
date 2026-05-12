## 🚀 DÉMARRAGE RAPIDE

### Fichiers à utiliser :

1. **index.html** - La page principale avec countdown et modal RGPD
2. **admin.html** - Tableau de bord pour voir les données

### C'est tout ! 🎉

Aucune configuration serveur requise. Tout fonctionne en **JavaScript pur** + **localStorage**.

---

## 📱 Utilisation

### Pour les visiteurs :
1. Ouvrir `index.html`
2. Modal RGPD s'affiche
3. Accepter/Refuser le consentement
4. Les données sont enregistrées en localStorage

### Pour voir les données :

**Option 1 - Console JavaScript (F12) :**
```javascript
viewVisitsData()        // Affiche les visites
exportVisitsData()      // Télécharge JSON
```

**Option 2 - Panneau Admin (RECOMMANDÉ) :**
1. Ouvrir `admin.html`
2. Voir les statistiques et le tableau
3. Télécharger les données en JSON

---

## 📊 Fonctionnalités

✅ Capture d'IP publique  
✅ Enregistrement de la date/heure  
✅ Identifiant unique de session  
✅ Modal RGPD complète  
✅ Nettoyage automatique (90 jours)  
✅ Export JSON  
✅ Tableau de bord admin  
✅ LocalStorage (pas de PHP)  

---

## 🔒 RGPD

- ✅ Consentement explicite (modal)
- ✅ Transparence (conditions affichées)
- ✅ Rétention limitée (90 jours)
- ✅ Droits utilisateur (affichés dans la modal)

---

## 📝 Fichiers inutilisés

- `record_visit.php` - **Ne plus utiliser** (ancien système PHP)

---

## 🔐 Production

Avant de publier :

1. ✅ Mettre en HTTPS
2. ✅ Protéger `admin.html` par mot de passe
3. ✅ Télécharger les données régulièrement
4. ✅ Masquer les détails des IPs

---

Besoin d'aide ? Voir `README.md` pour la documentation complète ! 📖
