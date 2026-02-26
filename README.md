# sql-injection-waf-nginx-modsecurity
Demonstrates SQL Injection exploitation and mitigation using ModSecurity WAF on Nginx deployed on AWS EC2, showcasing real-world web application security implementation. The objective is to showcase practical web application security implementation and WAF-based mitigation.


## Deployed Application

🔓 Vulnerable Login (Exploitable)
http://3.106.134.222/page1.php

🔐 Protected Login (WAF Enabled)
http://3.106.134.222/page2.php


## Testing Results
<img width="456" height="158" alt="image" src="https://github.com/user-attachments/assets/b7efe6f2-7448-47a1-bcc7-7085fa660484" />


## Architecture

Client
⬇
AWS EC2
⬇
Nginx
⬇
ModSecurity WAF
⬇
PHP Application
⬇
MySQL Database

The WAF intercepts malicious requests before reaching the application layer.

## Technology Stack

AWS EC2 (Ubuntu 22.04)
Nginx
PHP
MySQL
ModSecurity v3
OWASP Core Rule Set (CRS)

## High-Level Setup Steps

1. Launch EC2 instance (Ubuntu)
2. Install Nginx, PHP, MySQl
3. Install ModSecurity and CRS
4. Enable ModSecurity in Nginx configuration
5. Add custom WAF rule
6. Restart Nginx and validate

## Conclusion

This project successfully demonstrates:

Identification and exploitation of SQL Injection
Mitigation using ModSecurity WAF
Secure configuration and validation in a cloud deployment environment
It reflects practical understanding of web application security and WAF-based protection mechanisms.


🔹 Review your GitHub repo before final submission


You're presenting a solid hands-on security project 👏
