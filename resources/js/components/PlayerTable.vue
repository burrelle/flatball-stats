<script>
import CutterTable from "./CutterTable.vue";
import AllPlayersTable from "./AllPlayersTable.vue";
import HandlersTable from "./HandlersTable.vue";
export default {
  data: () => ({
    selected: "all"
  }),
  props: ["fullteam", "cutters", "handlers"],
  render() {
    const displayFilter = (selected, players, handlers, cutters) => {
      switch (selected) {
        case "all":
          return <AllPlayersTable players={players} />;
        case "handler":
          return <HandlersTable handlers={handlers} />;
        case "cutter":
          return <CutterTable cutters={cutters} />;
        default:
          break;
      }
    };

    const { players } = this.fullteam;

    return (
      <div>
        <span onClick={() => (this.selected = "all")}>All Players</span>
        <span onClick={() => (this.selected = "handler")}>Handlers</span>
        <span onClick={() => (this.selected = "cutter")}>Cutters</span>
        {displayFilter(this.selected, players, this.handlers, this.cutters)}
      </div>
    );
  }
};
</script>

<style>
span {
  margin-right: 0.25rem;
  cursor: pointer;
}

span:hover {
    text-decoration: underline;
}
</style>
