/*
Dobbiamo creare una web-app che permetta di leggere e scrivere una lista di Todo.
Deve essere anche gestita la persistenza dei dati leggendoli da, e scrivendoli in un file JSON.
Stack
Html, CSS, VueJS (importato tramite CDN), axios, PHP
Consigli
Nello svolgere l’esercizio seguite un approccio graduale.
Prima assicuratevi che la vostra pagina index.php (il vostro front-end) riesca a comunicare correttamente con il vostro script PHP (le vostre “API”).
Lo step successivo è quello di “testare" l'invio di un nuovo task, sapendo che manca comunque la persistenza lato server (ancora non memorizzate i dati da nessuna parte).
Solo a questo punto sarà utile passare alla lettura della lista da un file JSON.
Bonus
Mostrare lo stato del task → se completato, barrare il testo
Permettere di segnare un task come completato facendo click sul testo
Permettere il toggle del task (completato/non completato)
Abilitare l’eliminazione di un task
*/

const { createApp } = Vue;

createApp({
  data() {
    return {
      list: [],
      el: "",
      apiUrl: "server.php",
    };
  },
  methods: {
    createList() {
      axios.get(this.apiUrl).then((res) => {
        this.list = res.data;
        console.log(this.list);
      });
    },
    addNewEl() {
      // const elToPush = {
      //   text: this.el,
      //   done: false,
      // };
      // this.list.push(elToPush);
      // this.el = "";
      const data = {
        element: this.el,
        done: this.done,
      };
      axios
        .post(this.apiUrl, data, {
          headers: { "Content-Type": "multipart/form-data" },
        })
        .then((res) => {
          this.el = "";
          this.list = res.data;
        });
    },
    taked(index) {
      if (this.list[index].done === true) {
        this.list[index].done = false;
      } else {
        this.list[index].done = true;
      }
    },
    removeEl(index) {
      this.list.splice(index, 1);
    },
  },
  mounted() {
    this.createList();
  },
}).mount("#app");
