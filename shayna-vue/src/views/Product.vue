<template>
<div class="home">
  <HeaderShayna/>
      <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <router-link to="/"><i class="fa fa-home"></i> Home</router-link>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" :src=gambar_dafault alt="" />
                            </div>
                            <div class="product-thumbs" v-if="productDetails.galleries.length > 0">
                                <carousel :dots="false" :nav="false" :autoplay="true" class="product-thumbs-track ps-slider">

                                    <div v-for="ss in productDetails.galleries" v-bind:key='ss.id' class="pt" @click="changeImage(ss.photo)" v-bind:class="ss.photo == gambar_dafault ? 'active':''">
                                        <img :src="ss.photo" alt="" />
                                    </div>

                                </carousel>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ productDetails.type }}</span>
                                    <h3>{{ productDetails.name }}</h3>
                                </div>
                                <div class="pd-desc">
                                    <p v-html="productDetails.description"></p>
                                    <h4>${{ productDetails.price }}</h4>
                                </div>
                                <div class="quantity">
                                    <!-- <router-link to="/cart" class="primary-btn pd-cart"> -->
                                        <a @click="saveKeranjang(productDetails.id, productDetails.name, productDetails.price, productDetails.galleries[0].photo)"  href="#" class="primary-btn pd-cart"> Add To Cart </a>
                                    <!-- </router-link> -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
    <RelatedProduct/>
  <FooterShayna/>
</div>

</template>

<script>
// @ is an alias to /src
import HeaderShayna from '@/components/HeaderShayna.vue'
import FooterShayna from '@/components/FooterShayna.vue'
import carousel from 'vue-owl-carousel'
import RelatedProduct from '@/components/RelatedProduct.vue'
import axios from 'axios';

export default {
  name: 'Home',
  components: {
    HeaderShayna,
    FooterShayna,
    carousel,
    RelatedProduct
  },
  data: function() {
      return {
          gambar_dafault: '',
          thumbs: [],
          productDetails: [],
          keranjangUser: []
      }
  },
  methods: {
      changeImage(urlImage){
          this.gambar_dafault = urlImage;

          // eslint-disable-next-line no-console
          console.log(this.idProduct)

      },
      setDataPicture(data){
          this.productDetails = data;
          this.gambar_dafault = data.galleries[0].photo
      },
      saveKeranjang(idProduct, nameProduct, priceProduct, photoProduct) {

          var productStored = {
              "id": idProduct,
              "name": nameProduct,
              "price": priceProduct,
              "photo": photoProduct
          }
          this.keranjangUser.push(productStored);
          const parsed = JSON.stringify(this.keranjangUser);
          localStorage.setItem('keranjangUser', parsed);
      }
  },
  mounted() {
      if(localStorage.getItem('keranjangUser')) {
          try {
              this.keranjangUser = JSON.parse(localStorage.getItem('keranjangUser'));
              
          } catch (error) {
              localStorage.removeItem('keranjangStorage');
              
          }
      }
      axios
      .get("http://localhost:8000/api/products", {
          params: {
              id : this.$route.params.id
          }
      })
      .then( res => this.setDataPicture(res.data.data))
      .catch( err => console.log(err) )
  }
}
</script>

<style scoped>
    .product-thumbs-track .pt {
        margin-right: 14px;
    }
    .breadcrumb-text {
    text-align: left;
    }
    .product-details {
        text-align: left;
    }
</style>
