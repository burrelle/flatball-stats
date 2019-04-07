<script>
import PlayersTableHeader from './PlayersTableHeader.vue';
export default {
  props: ["players"],
  render() {
    return (
      <table>
        <PlayersTableHeader />
        {this.players.map(({ name, number, gender }) => (
          <tr>
            <td class="p-1">{number}.</td>
            <td class="p-1">{name}</td>
            <td class="p-1">{gender}</td>
          </tr>
        ))}
      </table>
    );
  }
};
</script>
