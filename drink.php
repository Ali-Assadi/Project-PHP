<?php
// Define paths for resources
$photosPath = "photos/food_images/";
$cssPath = "css_files/product.css";
$jsPath = "javascript_files/product.js";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="<?= $jsPath ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?= $cssPath ?>" />
    <title>Food Menu</title>
  </head>
  <body
    style="background-image: url('<?= $photosPath ?>GoldBorderWallpaper.jpg');"
  >
  <div class="drink">
  <div class="item">
    <img
      src="photos/drinks_images/Coca Cola.jpg"
      data-id="1"
      data-name="Coca Cola"
      data-price="7"
      style="margin-left: 90px; margin-top: 180px"
    />
    <div class="tooltip" style="margin-left: 45px; margin-bottom: 250px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Fanta Orange.jpg"
      data-id="2"
      data-name="Fanta Orange"
      data-price="7"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div class="tooltip" style="margin-left: 27px; margin-bottom: 140px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Sprite Extreme.jpg"
      data-id="3"
      data-name="Sprite Extreme"
      data-price="8"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 35px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Fanta Strawberry Kiwi.jpg"
      data-id="4"
      data-name="Fanta Strawberry Kiwi"
      data-price="10"
      style="margin-left: 190px; margin-top: 180px"
    />
    <div class="tooltip" style="margin-left: 95px; margin-bottom: 250px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Sprite Zero.jpg"
      data-id="5"
      data-name="Sprite Zero"
      data-price="7"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div class="tooltip" style="margin-left: 30px; margin-bottom: 120px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Coca Cola Zero.jpg"
      data-id="6"
      data-name="Coca Cola Zero"
      data-price="7"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Chocolate Ice Vanil.jpg"
      data-id="7"
      data-name="Chocolate Ice Vanil"
      data-price="10"
      style="margin-left: 190px; margin-top: 180px"
    />
    <div class="tooltip" style="margin-left: 95px; margin-bottom: 250px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Chocolate Milk.jpg"
      data-id="8"
      data-name="Chocolate Milk"
      data-price="10"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div class="tooltip" style="margin-left: 30px; margin-bottom: 120px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Ice Vanil.jpg"
      data-id="9"
      data-name="Ice Vanil"
      data-price="10"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Kabitchino.jpg"
      data-id="10"
      data-name="Kabitchino"
      data-price="6"
      style="margin-left: 190px; margin-top: 180px"
    />
    <div class="tooltip" style="margin-left: 95px; margin-bottom: 250px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Lateh.jpg"
      data-id="11"
      data-name="Lateh"
      data-price="8"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div class="tooltip" style="margin-left: 30px; margin-bottom: 120px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Espresso.jpg"
      data-id="12"
      data-name="Espresso"
      data-price="5"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Dark Chocolate.jpg"
      data-id="13"
      data-name="Dark Chocolate"
      data-price="15"
      style="margin-left: 180px; margin-top: 180px"
    />
    <div class="tooltip" style="margin-left: 95px; margin-bottom: 250px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Arabic Caffe.jpg"
      data-id="14"
      data-name="Arabic Caffe"
      data-price="12"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div class="tooltip" style="margin-left: 30px; margin-bottom: 120px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Tea.jpg"
      data-id="15"
      data-name="Tea"
      data-price="5"
      style="margin-left: 60px; margin-top: 420px"
    />
    <div class="tooltip" style="margin-left: 25px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Lemon Jucie.jpg"
      data-id="16"
      data-name="Lemon Jucie"
      data-price="7"
      style="margin-left: 185px; margin-top: 180px"
    />
    <div class="tooltip" style="margin-left: 95px; margin-bottom: 250px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Orange Jucie.jpg"
      data-id="17"
      data-name="Orange Jucie"
      data-price="10"
      style="margin-left: 60px; margin-top: 300px"
    />
    <div class="tooltip" style="margin-left: 30px; margin-bottom: 120px"></div>
  </div>
  <div class="item">
    <img
      src="photos/drinks_images/Strawberry Jucie.jpg"
      data-id="18"
      data-name="Strawberry Jucie"
      data-price="15"
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
          const nameRegex = /^[A-Za-z\s'-]+$/;
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
