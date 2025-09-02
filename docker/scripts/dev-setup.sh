#!/bin/bash

# Development setup script for Finance Tracker API
# This script helps set up the development environment

set -e

echo "Setting up Finance Tracker API development environment..."
echo "███████╗██╗███╗   ██╗ █████╗ ███╗   ██╗ ██████╗███████╗ "
echo "██╔════╝██║████╗  ██║██╔══██╗████╗  ██║██╔════╝██╔════╝ "
echo "█████╗  ██║██╔██╗ ██║███████║██╔██╗ ██║██║     █████╗   "
echo "██╔══╝  ██║██║╚██╗██║██╔══██║██║╚██╗██║██║     ██╔══╝   "
echo "██║     ██║██║ ╚████║██║  ██║██║ ╚████║╚██████╗███████╗ "
echo "╚═╝     ╚═╝╚═╝  ╚═══╝╚═╝  ╚═╝╚═╝  ╚═══╝ ╚═════╝╚══════╝ "
echo "           ████████╗██████╗  █████╗  ██████╗██╗  ██╗███████╗██████╗ "
echo "           ╚══██╔══╝██╔══██╗██╔══██╗██╔════╝██║ ██╔╝██╔════╝██╔══██╗"
echo "              ██║   ██████╔╝███████║██║     █████╔╝ █████╗  ██████╔╝"
echo "              ██║   ██╔══██╗██╔══██║██║     ██╔═██╗ ██╔══╝  ██╔══██╗"
echo "              ██║   ██║  ██║██║  ██║╚██████╗██║  ██╗███████╗██║  ██║"
echo "              ╚═╝   ╚═╝  ╚═╝╚═╝  ╚═╝ ╚═════╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝"
echo "                   ** Finance Tracker API **"


# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker and try again."
    exit 1
fi

# Check if .env exists, if not create from example
if [ ! -f .env ]; then
    echo "📝 Creating .env file..."
    if [ -f .env.example ]; then
        cp .env.example .env
        echo "✅ .env file created from .env.example"
    else
        echo "❌ .env.example not found. Please create it manually."
        exit 1
    fi
fi

# Build and start containers
echo "🏗️  Building Docker containers..."
docker-compose build

echo "🚀 Starting development environment..."
docker-compose up -d

# Wait for containers to be ready
echo "⏳ Waiting for services to be ready..."
sleep 10

# Install Composer dependencies
echo "📦 Installing Composer dependencies..."
docker-compose exec app composer install

# Generate application key
echo "🔑 Generating application key..."
docker-compose exec app php artisan key:generate

# Run migrations
echo "🗄️  Running database migrations..."
docker-compose exec app php artisan migrate --seed

# Clear caches
echo "🧹 Clearing application caches..."
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan route:clear

echo ""
echo "✅ Development environment is ready!"
echo ""
echo "🌐 API URL: http://localhost:8080/api"
echo "🗄️  Database: localhost:3306"
echo ""
echo "📋 Useful commands:"
echo "  docker-compose logs app     # View application logs"
echo "  docker-compose exec app bash # Enter application container"
echo "  docker-compose exec db mysql -u laravel -p finance_tracker # Access database"
echo ""