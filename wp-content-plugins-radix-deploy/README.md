# Radix Auto-Deploy Plugin

WordPress plugin for automatic theme deployment from GitHub.

## Features

- 🚀 Automatic deployment when pushing to GitHub
- 🔒 Secure webhook with signature verification
- 📊 Deploy logs viewer in WordPress admin
- 🧪 Manual deploy testing
- 🧹 Automatic cache clearing after deploy

## Installation

1. Upload the `radix-deploy-plugin` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Go to Tools → Auto-Deploy to configure

## GitHub Configuration

1. Go to your repository settings
2. Navigate to Webhooks → Add webhook
3. Set Payload URL to: `https://radixspa.cl/wp-json/radix-deploy/v1/webhook`
4. Content type: `application/json`
5. Secret: `RADIX_DEPLOY_2024_SECURE`
6. Select "Just the push event"
7. Save webhook

## Usage

Once configured, every push to the `main` branch will automatically:

1. Pull latest changes from GitHub
2. Update the theme files
3. Clear WordPress cache
4. Log the deployment

## Requirements

- WordPress 5.0+
- Git installed on server
- SSH/Shell access for initial git setup

## Security

The plugin verifies GitHub webhook signatures to ensure requests come from GitHub.
