# # # AWS Project: Simple Web Application with EC2, S3, CloudFront, and RDS

This project demonstrates a simple and scalable web application architecture using core AWS services.

## Architecture Overview

![](/img/Architechure%20daigram.png)

### Components

- **Amazon EC2**  
  Runs the web and application server.

- **Amazon S3**  
  Stores static files like images, CSS, and JavaScript.

- **Amazon CloudFront**  
  Delivers content globally with low latency.

- **Amazon RDS (MySQL)**  
  Stores application data securely.

## Flow

1. User accesses the application via **CloudFront**.  
2. Static content (CSS, JS, images) is served from **S3** through CloudFront.  
3. Dynamic requests are handled by **EC2**.  
4. **EC2** communicates with **RDS** for database operations.

## Security

- RDS is placed in a private subnet (no public access).  
- Only EC2 can connect to RDS.  
- S3 buckets are configured with proper security and policies.  

## Benefits

- Simple and cost-effective architecture.  
- CloudFront improves performance globally.  
- EC2 with Auto Scaling can handle load as required.  
- RDS provides managed and reliable database service.  
Project

## 🌐 EC2 (Elastic Compute Cloud)

![](/img/Screenshot%202025-09-16%20174510.png)

Tuza t2.micro instance (free tier eligible) web + app server mhanun vaparlay.

Installed software: Nginx, PHP, MySQL Client.

EC2 security group madhe:

Port 22 (SSH) → developer access.

Port 80 (HTTP) → web traffic.

Port 443 (HTTPS) → secure traffic (SSL lagel tar).

Elastic IP gheun tu permanent IP assign karu shakto.

Auto Scaling Group (ASG) add kela tar user load handle karta yeil.

## 📦 S3 (Simple Storage Service)

![](/img/Screenshot%202025-09-16%20174533.png)

Bucket name: aclewala

Store karto: user-uploaded images, static files (CSS, JS, Images).

Bucket Policy / IAM Role use karun access manage kartos.

Best Practice:

Make bucket private.

CloudFront distribution la attach kar (direct S3 public URLs band).

Advantage: Highly durable (99.999999999% durability).

## 🚀 CloudFront (Content Delivery Network)

![](/img/Screenshot%202025-09-16%20174545-1.png)

Global CDN je tuzha static content world-wide distribute karto.

Example: User Mumbai madhe asel tar nearest India Edge Location madhun file milel.

Latency kam, speed jast.

Features:

HTTPS SSL certificate configure karu shakto.

Custom domain (e.g., cdn.myapp.com).

Caching rules (images 1 day cache, HTML 5 min cache).

## 🛢 RDS (Relational Database Service)


![](/img/Screenshot%202025-09-16%20174608.png))

Engine: MySQL

Placed in private subnet (no public access → secure).

Only EC2 security group la allow kelela.

Automated backups + Multi-AZ option enable kela tar DB crash jhala tari replica ready rahil.

Tuzyakadhe user form data securely store hoto: (name, class, city, rating, etc.).

🔐 Security & IAM

EC2 instance la IAM Role attach karaycha → direct S3/CloudFront access milto (secret keys hardcode karaychi garaj nahi).

S3 bucket policy minimal rakhi (principle of least privilege).

RDS → no public IP, only VPC internal communication.

HTTPS/SSL configure kar cloudfront var → user data encryption.

📊 Monitoring (CloudWatch)

EC2 Metrics → CPU, Memory, Network traffic.

RDS Metrics → Connections, Latency, Queries/sec.

CloudFront Logs → User access pattern.

S3 Logs → File access logs.

Alerts configure karun Auto Scaling trigger karu shakto.

📈 Cost Optimization

Free Tier madhe:

EC2: 750 hours/month (t2.micro).

S3: 5 GB free.

CloudFront: 50 GB data transfer.

RDS: 750 hours + 20 GB storage.

Long-term production sathi:

Reserved Instance gheun cost kam karu shakto.

S3 Intelligent-Tiering storage use kar.

CloudFront caching increase kar → data transfer cost kam.

