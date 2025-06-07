# API Documentation

## Table of Contents

- [Overview](#overview)
- [API Endpoints](#api-endpoints)
- [Database Migrations](#database-migrations)
- [General Redesign Recommendations](#general-redesign-recommendations)
- [Controllers](#controllers)
- [Models](#models)

---

## Overview

This document describes the API endpoints, models, controllers, and database migrations for the project. All endpoints are versioned under `/api/v1/` and follow RESTful conventions.

---

## API Endpoints

### User Authentication & Profile

| Method | Endpoint                      | Description                | Controller           |
|--------|-------------------------------|----------------------------|----------------------|
| POST   | /api/v1/users/register        | Register a new user        | UserAuthController   |
| POST   | /api/v1/users/login           | User login                 | UserAuthController   |
| POST   | /api/v1/users/logout          | User logout                | UserAuthController   |
| GET    | /api/v1/users/{id}            | Get user profile           | UserAuthController   |
| PUT    | /api/v1/users/{id}            | Update user profile        | UserAuthController   |

---

### Raffles

| Method | Endpoint                      | Description                        | Controller         |
|--------|-------------------------------|------------------------------------|--------------------|
| GET    | /api/v1/raffles               | List all raffles                   | RaffleController   |
| POST   | /api/v1/raffles               | Create a new raffle                | RaffleController   |
| GET    | /api/v1/raffles/{id}          | Get raffle details                 | RaffleController   |
| PUT    | /api/v1/raffles/{id}          | Update a raffle                    | RaffleController   |
| DELETE | /api/v1/raffles/{id}          | Delete a raffle                    | RaffleController   |
| GET    | /api/v1/raffles/{id}/tickets  | List tickets for a raffle          | RaffleController   |

---

### Categories

| Method | Endpoint                      | Description                        | Controller             |
|--------|-------------------------------|------------------------------------|------------------------|
| GET    | /api/v1/categories            | List all categories                | CategoryController     |
| POST   | /api/v1/categories            | Create a new category              | CategoryController     |
| DELETE | /api/v1/categories/{id}       | Delete a category                  | CategoryController     |

---

### Organisations

| Method | Endpoint                      | Description                        | Controller               |
|--------|-------------------------------|------------------------------------|--------------------------|
| GET    | /api/v1/organisations         | List all organisations             | OrganisationController   |
| POST   | /api/v1/organisations         | Create a new organisation          | OrganisationController   |
| GET    | /api/v1/organisations/{id}    | Get organisation details           | OrganisationController   |

---

### Addresses

| Method | Endpoint                      | Description                       | Controller           |
|--------|-------------------------------|------------------------------------|----------------------|
| GET    | /api/v1/addresses             | List all addresses                 | UserAuthController   |
| POST   | /api/v1/addresses             | Create a new address               | UserAuthController   |
| GET    | /api/v1/addresses/{id}        | Get address details                | UserAuthController   |

---

### Payments

| Method | Endpoint                      | Description                        | Controller           |
|--------|-------------------------------|------------------------------------|----------------------|
| POST   | /api/v1/payments/paypal       | Make a PayPal payment              | PayPalController     |
| POST   | /api/v1/payments/stripe       | Make a Stripe payment              | StripeController     |
| GET    | /api/v1/payments/history      | Get payment history                | PayPalController     |

---

### Location Data

| Method | Endpoint                                  | Description                        | Controller         |
|--------|------------------------------------------|------------------------------------|--------------------|
| GET    | /api/v1/locations/countries              | List all countries                 | (not shown)        |
| GET    | /api/v1/locations/states?country_id=     | List states by country             | (not shown)        |
| GET    | /api/v1/locations/cities?state_id=       | List cities by state               | (not shown)        |

---

### Newsletter

| Method | Endpoint                      | Description                        | Controller           |
|--------|-------------------------------|------------------------------------|----------------------|
| POST   | /api/v1/newsletters/subscribe | Subscribe to newsletter            | (not shown)          |

---

### Fundraising

| Method | Endpoint                      | Description                        | Controller               |
|--------|-------------------------------|------------------------------------|--------------------------|
| POST   | /api/v1/fundraising           | Create a fundraising entry         | FundraisingController    |

---

### Ticket Prices

| Method | Endpoint                      | Description                        | Controller           |
|--------|-------------------------------|------------------------------------|----------------------|
| GET    | /api/v1/ticket-prices         | List ticket prices                 | (not shown)          |

---

### Image Upload

| Method | Endpoint                      | Description                        | Controller           |
|--------|-------------------------------|------------------------------------|----------------------|
| POST   | /api/v1/images/upload         | Upload an image                    | ImageUploadController|

---

## Database Migrations

Below is a summary of the main migrations and their key columns.  
**Note:** Table names should be pluralized for best practice.

---

### Users

- **Table:** `users`
- **Columns:** id, first_name, last_name, email, username, password, gender, image, device_name, about, user_type, status, reg_status, remember_token, timestamps

---

### Password Reset Tokens

- **Table:** `password_reset_tokens`
- **Columns:** email (PK), token, created_at

---

### Personal Access Tokens

- **Table:** `personal_access_tokens`
- **Columns:** id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, timestamps

---

### Failed Jobs

- **Table:** `failed_jobs`
- **Columns:** id, uuid, connection, queue, payload, exception, failed_at

---

### Newsletter

- **Table:** `newsletter`
- **Columns:** id, email, timestamps

---

### Category

- **Table:** `category`
- **Columns:** id, category_name, category_status, timestamps

---

### Organisation

- **Table:** `organisation`
- **Columns:** id, user_id, organisation_name, cover_image, category_id, nick_name, handle, website, description, status, timestamps

---

### Addresses

- **Table:** `addresses`
- **Columns:** id, first_name, last_name, email, company_name, street, apartment, city, user_id, type (1: billing, 2: shipping), zip_code, timestamps

- **Table:** `billaddress`
- **Columns:** id, first_name, last_name, company_name, region, street_name, apartment, town, country, zipcode, phone_number, email, timestamps

- **Table:** `shipaddress`
- **Columns:** id, first_name, last_name, company_name, region, street_address, apartment, town, country, zipcode, timestamps

---

### Raffle

- **Table:** `raffle`
- **Columns:** id, user_id, organisation_id, fundraising_id, host_name, description, image1-4, target, starting_date, ending_date, state_raffle_hosted, approve_status, timestamps

- **Table:** `raffle_order`
- **Columns:** id, raffle_id, amount, date_purchase, user_id, winner_status, timestamps

- **Table:** `raffle_winner`
- **Columns:** id, raffle_id, winner_id, host_id, winner_date

---

### Ticket Price

- **Table:** `ticket_price`
- **Columns:** id, raffle_id, one, three, ten, twenty, one_twenty, two_hundred

---

### Supported Raffle

- **Table:** `supported_raffle`
- **Columns:** id, name, timestamps

---

### Fundraising Check

- **Table:** `fundraising_check`
- **Columns:** id, user_id, name, CO, address, addressline, city, state, country, zip_code, phone_number, timestamps

---

### Payment History

- **Table:** `payment_history`
- **Columns:** id, payment_id, user_id, amount, currency, status, payer_email, transaction_id, payment_method, timestamps

- **Table:** `payment_settings`
- **Columns:** id, payment_name, code_access (json), updated_at

---

### Location Data

- **Table:** `location_data`
- **Columns:** id, user_id, ip_address, created_at

---

### Countries, States, Cities

- **Table:** `countries`
- **Columns:** id, shortname, name, phonecode, timestamps

- **Table:** `states`
- **Columns:** id, name, country_id, timestamps

- **Table:** `cities`
- **Columns:** id, name, state_id, timestamps

---

## General Redesign Recommendations

- Use plural table names and consistent naming conventions.
- Define all relationships in Eloquent models.
- Use Laravel resource controllers for CRUD operations.
- Centralize validation with Form Requests.
- Standardize API responses (success, error, data, message).
- Add foreign key constraints and indexes in migrations.
- Use soft deletes where appropriate.
- Version all APIs under `/api/v1/`.

---

## Controllers

### UserAuthController
Handles user registration, authentication, profile management, and address operations.
- **Key actions:** Register, login, logout, update profile, manage addresses, create organisation.
- **Related models:** User, Organisation, Address.

### RaffleController
Manages all raffle-related operations.
- **Key actions:** Create, list, update, delete raffles; manage raffle tickets.
- **Related models:** Raffle, RaffleOrder, RaffleWinner, TicketPrice.

### CategoryController
Handles category management for raffles.
- **Key actions:** List, create, and delete categories.
- **Related models:** Category.

### OrganisationController
Manages organisations created by users or hosts.
- **Key actions:** Create and retrieve organisations.
- **Related models:** Organisation.

### FundraisingController
Handles creation and validation of fundraising entries.
- **Key actions:** Create fundraising entry.
- **Related models:** FundraisingCheck.

### PayPalController
Handles PayPal payment processing and callbacks.
- **Key actions:** Initiate payment, handle success/failure, retrieve payment history.
- **Related models:** PaymentHistory.

### StripeController
Handles Stripe payment processing.
- **Key actions:** Initiate Stripe payment.
- **Related models:** PaymentHistory.

### ImageUploadController
Handles image uploads for the application.
- **Key actions:** Upload images.
- **Related models:** (Stores file paths, not directly tied to a model.)

### AdminRouteController
Handles admin dashboard, user/admin management, category management, raffle approval, and payment settings.
- **Key actions:** Manage users, admins, categories, raffles, and payment settings.
- **Related models:** User, Category, Organisation, Raffle.

### HostController
Handles host dashboard and host-specific raffle management.
- **Key actions:** View dashboard, manage raffles.
- **Related models:** Raffle.

---

## Models

### User
Represents application users (admin, host, user).
- **Fields:** first_name, last_name, username, email, password, user_type, about, image, etc.

### Organisation
Represents organisations created by users/hosts.
- **Fields:** user_id, organisation_name, cover_image, category_id, handle, website, description, status, etc.

### Category
Represents raffle categories.
- **Fields:** category_name, category_status.

### Raffle
Represents a raffle event.
- **Fields:** user_id, organisation_id, fundraising_id, host_name, description, images, target, starting_date, ending_date, state_raffle_hosted, approve_status, etc.

### RaffleOrder
Represents a ticket purchase/order for a raffle.
- **Fields:** raffle_id, amount, date_purchase, user_id, winner_status.

### RaffleWinner
Represents the winner of a raffle.
- **Fields:** raffle_id, winner_id, host_id, winner_date.

### TicketPrice
Represents ticket pricing for a raffle.
- **Fields:** raffle_id, one, three, ten, twenty, one_twenty, two_hundred.

### PaymentHistory
Represents payment transactions.
- **Fields:** payment_id, user_id, amount, currency, status, payer_email, transaction_id, payment_method.

### BillingAddress
Represents billing addresses for users.
- **Fields:** first_name, last_name, company_name, region, street_name, apartment, town, country, zipcode, phone_number, email.

### ShippingAddress
Represents shipping addresses for users.
- **Fields:** first_name, last_name, company_name, region, street_address, apartment, town, country, zipcode.

### FundraisingCheck
Represents fundraising entries.
- **Fields:** user_id, name, CO, address, addressline, city, state, country, zip_code, phone_number.

### Country / State / City
Represents location data for addresses.
- **Fields:** name, shortname, phonecode (country); name, country_id (state); name, state_id (city).

---


*For further details on request/response formats, authentication, and error handling, see the [API Reference](docs/api_reference.md) (to be created).*