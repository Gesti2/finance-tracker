# Finance Tracker API - Docker Setup

This directory contains the Docker configuration for the Finance Tracker API project.

## 📁 Directory Structure

```
docker/
├── nginx/                # Nginx configuration
│   └── nginx.conf        # Main nginx configuration
├── php/                  # PHP configuration
│   └── php-dev.ini       # Development PHP settings
├── scripts/              # Utility scripts
│   ├── dev-setup.sh      # Development setup script
│   └── init-app.sh       # Application initialization
└── README.md             # This file
```

## 🚀 Quick Start

### Development Environment

1. **Clone and setup:**
   ```bash
   git clone <repository>
   cd finance-tracker
   ```

2. **Run the setup script:**
   ```bash
   chmod +x docker/scripts/dev-setup.sh
   ./docker/scripts/dev-setup.sh
   ```

3. **Or manually:**
   ```bash
   # Copy environment file
   cp .env.example .env
   
   # Build and start containers
   docker-compose up -d
   
   # Install dependencies and setup
   docker-compose exec app composer install
   docker-compose exec app php artisan key:generate
   docker-compose exec app php artisan migrate --seed
   ```

## 🛠 Services

### Application (PHP-FPM)
- **Image:** Custom built from `Dockerfile`
- **Port:** Internal 9000
- **Features:**
  - Multi-stage build (development/production)
  - OPcache optimization
  - Xdebug for development

### Database (MySQL)
- **Image:** mysql:8.4
- **Port:** 3306 (configurable)
- **Features:**
  - Persistent data storage
  - Health checks
  - Optimized configuration for production

### Web Server (Nginx)
- **Image:** nginx:1.25-alpine
- **Ports:** 80, 443
- **Features:**
  - Optimized for Laravel
  - Security headers
  - Gzip compression

## 🔧 Configuration

### Environment Variables

| Variable | Default | Description |
|----------|---------|-------------|
| `APP_PORT` | 8080 | Application HTTP port |
| `APP_SSL_PORT` | 8443 | Application HTTPS port |
| `DB_PORT` | 3306 | Database port |
| `USER` | laravel | Docker user name |
| `UID` | 1000 | Docker user ID |

### PHP Configuration

- **Development:** Extended error reporting, Xdebug enabled
- **Production:** Optimized for performance, OPcache enabled (Comming Soon)

### Database Optimization

Production MySQL configuration includes:
- InnoDB buffer pool optimization
- Connection limits
- Query cache disabled (as recommended for modern MySQL)

## 📋 Common Commands

### Development
```bash
# View logs
docker-compose logs -f app

# Enter application container
docker-compose exec app bash

# Run artisan commands
docker-compose exec app php artisan migrate
docker-compose exec app php artisan tinker

# Access database
docker-compose exec db mysql -u laravel -p finance_tracker

# Monitor Redis
docker-compose exec redis redis-cli
```

## 🔒 Security Features

### Application Security
- Non-root user execution
- Secure PHP configuration
- Hidden server information
- File permission hardening

### Network Security
- Rate limiting on API endpoints
- Security headers

### Database Security
- Non-root database user
- Connection limits

## 📊 Monitoring & Logging

### Log Locations
- **Application:** `/var/log/php_errors.log`
- **Nginx:** `/var/log/nginx/`
<!-- - **Queue Workers:** `/var/log/worker.log`
- **Scheduler:** `/var/log/scheduler.log` -->

### Health Checks
- Database connectivity
- Application response
- Nginx status


## 🐛 Troubleshooting

### Common Issues

1. **Permission errors:**
   ```bash
   docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
   ```

2. **Database connection issues:**
   ```bash
   # Check if database is ready
   docker-compose exec app php artisan tinker --execute="DB::connection()->getPdo();"
   ```

3. **Cache issues:**
   ```bash
   docker-compose exec app php artisan cache:clear
   docker-compose exec app php artisan config:clear
   ```

### Performance Tuning

1. **Increase PHP memory limit:**
   - Edit `docker/php/php-prod.ini`
   - Restart containers

2. **Optimize database:**
   - Monitor slow query log
   - Adjust buffer pool size

3. **Redis optimization:**
   - Monitor memory usage
   - Adjust maxmemory policy

## 📈 Scaling

### Horizontal Scaling
```bash
# Scale application containers
docker-compose up -d --scale app=3

# Scale queue workers
docker-compose up -d --scale queue-worker=5
```

### Load Balancing
- Configure nginx upstream
- Use external load balancer
- Consider container orchestration (Kubernetes, Docker Swarm)

## 🤝 Contributing

When modifying Docker configuration:

1. Test in development environment first
2. Update this README if adding new services
3. Ensure production compatibility
4. Add appropriate health checks
5. Update backup scripts if needed

## 📞 Support

For Docker-related issues:
1. Check container logs
2. Verify environment variables
3. Test with minimal configuration
4. Check resource constraints
