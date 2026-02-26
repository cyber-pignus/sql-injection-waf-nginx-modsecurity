# Setup Guide – SQL Injection WAF Demo

This document describes the deployment steps for the SQL Injection demonstration project using Nginx and ModSecurity on AWS EC2.


## Prerequisites

- AWS Account
- Ubuntu 22.04 EC2 Instance
- Port 80 (HTTP) open in Security Group
- Basic Linux command knowledge

## Launch EC2 Instance

- AMI: Ubuntu 22.04 LTS
- Instance Type: t2.micro
- Allow inbound HTTP (port 80)

Connect via SSH:

```bash
ssh ubuntu@<EC2-PUBLIC-IP>
```

## Install Required Components

Update system:

```bash
sudo apt update && sudo apt upgrade -y
```

Install web stack:

```bash
sudo apt install nginx php-fpm php-mysql mysql-server -y
```

Install ModSecurity and CRS:

```bash
sudo apt install libnginx-mod-http-modsecurity modsecurity-crs -y
```


## Configure Database

- Create database named `testdb`
- Create `users` table
- Insert sample users (admin, test)

SQL schema is available in:

```
database/schema.sql
```


## Deploy Application Files

Place the following files in:

```
/var/www/html/
```

- `vulnerable/page1.php`
- `protected/page2.php`

Application source code is available in this repository.

---

## Enable ModSecurity in Nginx

Edit default site configuration:

```
/etc/nginx/sites-available/default
```

Enable:

- ModSecurity
- Rules file reference

Main configuration file is available in:

```
modsecurity/main.conf
```

---

## Add Custom WAF Rule

Custom rule file:

```
modsecurity/custom_rules.conf
```

This rule blocks SQL injection attempts specifically on `page2.php`.

---

## Restart Nginx

```bash
sudo nginx -t
sudo systemctl restart nginx
```


## Validation

Test normal login:
```
http://<EC2-IP>/page1.php?user=admin
```

Test SQL Injection:
```
http://<EC2-IP>/page2.php?user=' OR '1'='1
```

Expected behavior:

- page1 → exploitable
- page2 → returns 403 Forbidden


## Outcome

- page1 remains intentionally vulnerable
- page2 is protected using ModSecurity WAF
- SQL Injection is blocked before reaching application layer
