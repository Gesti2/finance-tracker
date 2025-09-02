# Finance Tracker API

A modern Laravel-based personal finance management API built with clean architecture principles and Docker containerization. This project serves as a practice ground for experimenting with new technologies, DevOps practices, and Laravel features.

![Laravel](https://img.shields.io/badge/Laravel-11.x-red?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php)
![Docker](https://img.shields.io/badge/Docker-Containerized-blue?style=flat-square&logo=docker)
![MySQL](https://img.shields.io/badge/MySQL-8.4-orange?style=flat-square&logo=mysql)
![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)

## Project Overview

Originally started as a full-stack application, this project has evolved into a standalone API following the **Controller-Service-Repository** architectural pattern. It's designed as a testing/learning platform for:

- 🏗️ Clean Architecture Implementation
- 📦 Modular Package Development
- 🐳 Docker & Containerization (so far only for dev)
- 🚀 CI/CD with GitHub Actions (planned)
- ☸️ Kubernetes Deployment (planned)


## Quick Start

### Prerequisites
- Docker & Docker Compose
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/gesti2/finance-tracker.git
   cd finance-tracker
   ```

2. **Quick setup with Docker**
   ```bash
   chmod +x docker/scripts/dev-setup.sh
   ./docker/scripts/dev-setup.sh
   ```

3. **Or manual setup**
   ```bash
   cp .env.example .env
   docker-compose up -d
   docker-compose exec app composer install
   docker-compose exec app php artisan key:generate
   docker-compose exec app php artisan migrate --seed
   ```

4. **Access the application**
   - API Base URL: `http://localhost:8080`
   - Database: `localhost:3306`

## Features

- **RESTful API** with versioned endpoints
- **Repository Pattern** for data abstraction
- **Service Layer** for business logic separation
- **Custom Service Response** handling
- **Database Factories & Seeders**
- **API Resources** for response transformation
- **Modular Architecture** with custom packages

## Architecture
```
Controllers → Services → Repositories
```

### Project Structure
```
app/
├── Http/
│   ├── Controllers/Api/V1/     # API Controllers
│   ├── Requests/Api/V1/        # Form Request Validation
│   ├── Resources/              # API Response Resources
│   └── Services/               # Business Logic Layer
├── Models/                     # Eloquent Models
├── Repositories/
│   ├── Contracts/              # Repository Interfaces
│   └── Eloquent/              # Repository Implementations
├── Providers/                  # Service Providers
└── Support/Classes/           # Utility Classes

modules/
└── Example/                   # Example Module Package
    ├── src/
    │   ├── Http/Controllers/
    │   ├── Providers/
    │   └── Repository/
    └── composer.json

docker/
├── nginx/                     # Nginx Configuration
├── php/                       # PHP Configuration
└── scripts/                   # Setup Scripts
```

## Docker Configuration

### Services
- **app**: PHP 8.2-FPM with Laravel application
- **nginx**: Nginx 1.28 web server
- **db**: MySQL 8.4 database

### Development Features
- **Multi-stage builds** for optimized images
- **Xdebug** enabled for development
- **Hot reload** with volume mounting
- **Non-root user** for security

### Environment Variables
| Variable | Default | Description |
|----------|---------|-------------|
| `APP_PORT` | 8080 | Application HTTP port |
| `DB_PORT` | 3306 | Database port |
| `USER` | laravel | Docker user name |
| `UID` | 1000 | Docker user ID |

## Modular Architecture

### Example Module
The project includes an example module demonstrating:
- Custom package creation
- Service provider registration
- Modular routing
- Independent composer configuration

### Adding New Modules
```bash
# Create new module structure
mkdir -p modules/YourModule/src
cd modules/YourModule

# Create composer.json
# Implement service provider
# Register in main composer.json
```

## Roadmap

### Tech Stack
- **Laravel 1, PHP 8.2+, MySQL 8.4** 
- **Laravel Sanctum** - API authentication
- **Docker + Nginx**
- **Dev tools** - Pint, Tinker, Composer

### Planned Features
- [ ] **GitHub Actions** CI/CD pipeline
- [ ] **Kubernetes** deployment configurations
- [ ] **Redis cache & queues**
- [ ] **API rate limiting & logging**
- [ ] Infrastructure as Code (Terraform)

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contributing

This is primarily a personal learning project, but contributions are welcome! Please submit a pull request with a clear description of your changes.


---

**Note**: This project is actively maintained as a learning platform. Features and architecture may evolve as new technologies and patterns are explored and I find time to do so.
