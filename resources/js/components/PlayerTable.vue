<script>
import CutterTable from "./CutterTable.vue";
import AllPlayersTable from "./AllPlayersTable.vue";
import HandlersTable from "./HandlersTable.vue";

const ALL = "all";
const HANDLER = "handler"
const CUTTER = "cutter"

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
        <span
          class={this.selected === ALL && "active"}
          onClick={() => (this.selected = ALL)}
        >
          All Players
        </span>
        <span
          class={this.selected === HANDLER && "active"}
          onClick={() => (this.selected = HANDLER)}
        >
          Handlers
        </span>
        <span
          class={this.selected === CUTTER && "active"}
          onClick={() => (this.selected = CUTTER)}
        >
          Cutters
        </span>
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

.active {
  color: blue;
}
</style>
