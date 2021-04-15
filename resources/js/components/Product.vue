<template>
    <div class="card-body">
        <input type="text" class="form-control" placeholder="Search" @input="searchProducts()" v-model="searchItem">
        <div class="row">
            <div class="col-6" style="margin-top: 20px"  v-for="product in products.data">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" :src="'img/'+product.image" alt="Card image cap" style="width: 200px;height: 200px; ">
                    <div class="card-body">
                        <h5 class="card-title">{{product.name}}</h5>
                        <p>Price:{{ product.price }}</p>

                        <a :href="'/addToCart/'+product.id" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="load-more">
            <button class="btn btn-success" v-if="products.next_page_url" @click.prevent="loadProducts">Load More</button>
            <span v-else>No more products :)</span>
        </div>
    </div>

</template>

<script>
export default {
    data(){
        return{
            products:{
                data:[]
            },
            searchItem:'',


        }
    },
    methods:{
        loadProducts(){
            const url=this.products.next_page_url ? this.products.next_page_url:'/get/products';

            axios.get(url).then(({data})=>{
                this.products={
                    ...data,
                    data:[
                        ...this.products.data,...data.data
                    ]
                };

            })
        },
        searchProducts(){
            axios.get('products/search?q='+this.searchItem).then(({data})=>{
                this.products=data;

            })

        }

    },
    created(){
        this.loadProducts();

    },
name: "Product"

}
</script>

<style scoped>
.load-more{
    margin-top: 20px;
    margin-left:280px;
}
</style>
