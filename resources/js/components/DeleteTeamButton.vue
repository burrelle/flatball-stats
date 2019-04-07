<script>
import axios from "axios";
export default {
  props: ["id"],
  render() {
    return <button onClick={() => this.delete(this.id)}>Delete</button>;
  },
  methods: {
    delete: async function(id) {
      try {
        await axios.post(`/teams/${id}`, { _method: "delete" });
        window.location.reload();
      } catch (error) {
        throw new Error(error);
      }
    }
  }
};
</script>
