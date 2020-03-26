<template>
      <div>
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <h1>Archive Articles</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4" v-for="article in articles" :key="article.id">
                    <article>
                        <h2>{{ article.title }}</h2>
                        <p>{{ article.description }}</p>
                        <router-link :to="{name: 'article', params: { slug: article.slug }}">Scopri di più</router-link>
                    </article>
                </div>
            </div>
        </div>
      </div>
</template>


<script>
    export default {
      data(){
        return {
          articles: []
        }
      },
      created() {
        let uri = 'http://127.0.0.1:8000/api/articles';
        this.axios.get(uri).then(response => {
          this.articles = response.data;
        });
      }
    }
</script>
