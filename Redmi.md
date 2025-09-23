# # # AWS Project: Simple Web Application with EC2, S3, CloudFront, and RDS

This project demonstrates a simple and scalable web application architecture using core AWS services.

## Architecture Overview

![](Architechure%20daigram.png)

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
