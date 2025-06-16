# Azilink

Plateforme de mise en relation entre **voyageurs** et **expéditeurs** pour l'envoi de colis à moindre coût, de manière rapide, fiable et sécurisée ✈️📦

---

## 🚀 Objectif

Permettre aux expéditeurs d’envoyer des colis via des voyageurs de confiance qui partagent leur itinéraire, tout en offrant aux voyageurs un moyen de rentabiliser leur trajet.

---

## 🛠 Fonctionnalités principales

- 🔍 Recherche de trajets disponibles
- ✈️ Proposition de voyage avec points de départ/destination
- 📦 Demande d’envoi de colis
- 💬 Système de messagerie entre voyageurs et expéditeurs
- 📅 Gestion des notifications et statuts de colis
- ✅ Système de vérification des utilisateurs
<!-- - 💸 Paiement sécurisé entre les parties -->

---

## 📦 Stack technique

- **Backend** : Laravel 10+
- **Frontend** : Blade + JS natif
- **Temps réel** : Pusher (messagerie instantanée)
- **Base de données** : MySQL
<!-- - **Paiement** : (Stripe, Paydunya, ou autre intégration à venir) -->
<!-- - **PDF/Impression** : DomPDF (factures ou tickets) -->

---

## ⚙️ Installation du projet

```bash
git clone https://github.com/NickTep519/azilink.git
cd azilink
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate
php artisan serve
