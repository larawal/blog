<template>
      <div>
        <div class="container py-5">
            <div class="row">
                <div class="col-12">
                    <h1>{{ article.title }}</h1>
                    <p>{{ article.description }}</p>
                </div>
            </div>
        </div>
      </div>
</template>


<script>
    export default {
      data(){
        return {
          article: {}
        }
      },
      created() {
        let uri = `http://127.0.0.1:8000/api/article/${this.$route.params.slug}`;
        this.axios.get(uri).then(response => {
          this.article = response.data;
        });
      }
    }
</script>
