<script>
import PlayersTableHeader from "./PlayersTableHeader.vue";
export default {
  props: ["cutters"],
  render() {
    return (
      <table>
        <PlayersTableHeader />
        {Object.keys(this.cutters).map(cutter => (
          <tr>
            <td class="p-1">{this.cutters[cutter].number}.</td>
            <td class="p-1">{this.cutters[cutter].name}</td>
            <td class="p-1">{this.cutters[cutter].gender}</td>
          </tr>
        ))}
      </table>
    );
  }
};
</script>
