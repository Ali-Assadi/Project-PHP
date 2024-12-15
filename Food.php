<?php
// Define paths for resources
$photosPath = "photos/food_images/";
$cssPath = "css_files/product.css";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?= $cssPath ?>" />
    <title>Food Menu</title>
  </head>
  <body
    style="background-image: url('<?= $photosPath ?>GoldBorderWallpaper.jpg');"
  >
  <div class="food">
  <div class="item">
    <img
      src="photos/food_images/classic burger.jpg"
      data-id="1"
      data-name="Classic Burger"
      data-price="40"
      style="margin-left: 90px; margin-top: 180px"
    />
    <div
      class="tooltip"
      style="margin-left: 45px; margin-bottom: 250px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/anotherBurger.jpg"
      data-id="2"
      data-name="Another Burger"
      data-price="75"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div
      class="tooltip"
      style="margin-left: 27px; margin-bottom: 140px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/Yet Another Burger.jpg"
      data-id="3"
      data-name="Yet Another Burger"
      data-price="100"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 35px"></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/Chicken Burger.jpg"
      data-id="4"
      data-name="Chicken Burger"
      data-price="40"
      style="margin-left: 190px; margin-top: 180px"
    />
    <div
      class="tooltip"
      style="margin-left: 95px; margin-bottom: 250px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/tortia.jpg"
      data-id="5"
      data-name="Mixed Tortia"
      data-price="60"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div
      class="tooltip"
      style="margin-left: 30px; margin-bottom: 120px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/Taco.jpg"
      data-id="6"
      data-name="Trible Taco"
      data-price="60"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/HomePizza.jpg"
      data-id="7"
      data-name="Home Pizza"
      data-price="40"
      style="margin-left: 190px; margin-top: 180px"
    />
    <div
      class="tooltip"
      style="margin-left: 95px; margin-bottom: 250px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/ClassicPizza.jpg"
      data-id="8"
      data-name="Classic Pizza"
      data-price="65"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div
      class="tooltip"
      style="margin-left: 30px; margin-bottom: 120px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/italicpizza.jpg"
      data-id="9"
      data-name="Italic Pizza"
      data-price="70"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/Napilion Pizza.jpg"
      data-id="10"
      data-name="Napilion Pizza"
      data-price="70"
      style="margin-left: 190px; margin-top: 180px"
    />
    <div
      class="tooltip"
      style="margin-left: 95px; margin-bottom: 250px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/shawrma.jpg"
      data-id="11"
      data-name="Shawrma"
      data-price="50"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div
      class="tooltip"
      style="margin-left: 30px; margin-bottom: 120px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/baget1.jpg"
      data-id="12"
      data-name="Baget"
      data-price="40"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/Diet1.jpg"
      data-id="13"
      data-name="Diet meal 1"
      data-price="45"
      style="margin-left: 180px; margin-top: 180px"
    />
    <div
      class="tooltip"
      style="margin-left: 95px; margin-bottom: 250px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/diet2.jpg"
      data-id="14"
      data-name="Diet meal 2"
      data-price="45"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div
      class="tooltip"
      style="margin-left: 30px; margin-bottom: 120px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/Diet3.jpg"
      data-id="15"
      data-name="Diet meal 3"
      data-price="45"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/fatosh.jpg"
      data-id="16"
      data-name="Fatosh Salad"
      data-price="30"
      style="margin-left: 185px; margin-top: 180px"
    />
    <div
      class="tooltip"
      style="margin-left: 95px; margin-bottom: 250px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/ArabicSalad.jpg"
      data-id="17"
      data-name="Arabic Salad"
      data-price="20"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div
      class="tooltip"
      style="margin-left: 30px; margin-bottom: 120px"
    ></div>
  </div>
  <div class="item">
    <img
      src="photos/food_images/tabola.jpg"
      data-id="18"
      data-name="Tabola"
      data-price="30"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
</div>


    <script>
      class Product {
        constructor(product_id, product_name, product_price) {
          this.setProductId(product_id);
          this.setProductName(product_name);
          this.setProductPrice(product_price);
        }

        setProductId(product_id) {
          const idRegex = /^[A-Za-z0-9-]+$/;
          if (idRegex.test(product_id)) {
            this.product_id = product_id;
          } else {
            throw new Error("Invalid product ID");
          }
        }

        getProductId() {
          return this.product_id;
        }

        setProductName(product_name) {
          const nameRegex = /^[A-Za-z0-9\s'-]+$/;
          if (nameRegex.test(product_name)) {
          this.product_name = product_name;
        } else {
        throw new Error("Invalid product name");
        }
        }


        getProductName() {
          return this.product_name;
        }

        setProductPrice(product_price) {
          const priceRegex = /^\d+(\.\d{1,2})?$/;
          if (priceRegex.test(product_price.toString())) {
            this.product_price = parseFloat(product_price);
          } else {
            throw new Error("Invalid product price");
          }
        }

        getProductPrice() {
          return this.product_price;
        }

        toString() {
          return `${this.product_name}, Price: ${this.product_price}₪`;
        }

        calculate_total_cost(quantity) {
          return this.product_price * quantity;
        }
      }

      function createProducts(...attributes) {
        const items = document.querySelectorAll(".item img");
        const products = [];

        for (const item of items) {
          const productData = {};
          for (const attr of attributes) {
            productData[attr] = item.getAttribute(`data-${attr}`);
          }

          try {
            const product = new Product(
              productData.id,
              productData.name,
              parseFloat(productData.price)
            );
            products.push(product);

            const tooltip = item.nextElementSibling;
            if (tooltip) {
              tooltip.textContent = `${product.getProductName()}, Price: ${product.getProductPrice()}₪`;
            }
          } catch (error) {
            console.error(`Error creating product: ${error.message}`);
          }
        }

        return products;
      }

      document.addEventListener("DOMContentLoaded", () => {
        const products = createProducts("id", "name", "price");
        console.log(products);

        if (products.length > 0) {
          const totalCost = products[0].calculate_total_cost(3);
          console.log(
            `Total cost for 3 units of ${products[0].getProductName()}: ${totalCost}₪`
          );
        }
      });
    </script>

  </body>
</html>
