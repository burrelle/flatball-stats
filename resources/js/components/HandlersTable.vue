<script>
import PlayersTableHeader from "./PlayersTableHeader.vue";
export default {
  props: ["handlers"],
  render() {
    return (
      <table>
        <PlayersTableHeader />
        {Object.keys(this.handlers).map(handler => (
          <tr>
            <td class="p-1">{this.handlers[handler].number}</td>
            <td class="p-1">{this.handlers[handler].name}</td>
            <td class="p-1">{this.handlers[handler].gender}</td>
          </tr>
        ))}
      </table>
    );
  }
};
</script>
