# FreelanceBoard
A web app platform connecting freelancers and clients.

# Installation

1. Clone the repo
  ```bash
  git clone https://github.com/2211846103/FreelanceBoard.git
  ```
2. Run:
  ```bash
  composer install
  npm install
  npm build
  ```
3. Make a copy of the file ```.env.example``` called ```.env```
4. Run:
  ```bash
  php artisan key:generate
  php artisan migrate
  ```

# Usage
Just run the following:
  ```bash
  composer run dev
  ```
or
  ```bash
  php artisan serve
  ```
and use the copy the resulting server url into your favorite browser