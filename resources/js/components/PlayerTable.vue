<script>
import CutterTable from "./CutterTable.vue";
import AllPlayersTable from "./AllPlayersTable.vue";
import HandlersTable from "./HandlersTable.vue";

const ALL = "all";
const HANDLER = "handler";
const CUTTER = "cutter";

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
        <div class="mb-2">
          <span
            class={
              this.selected === ALL
                ? "font-bold mr-1 text-blue-darker"
                : "hover:underline mr-1 cursor-pointer"
            }
            onClick={() => (this.selected = ALL)}
          >
            All Players
          </span>
          <span
            class={
              this.selected === HANDLER
                ? "font-bold mr-1 text-blue-darker"
                : "hover:underline mr-1 cursor-pointer"
            }
            onClick={() => (this.selected = HANDLER)}
          >
            Handlers
          </span>
          <span
            class={
              this.selected === CUTTER
                ? "font-bold mr-1 text-blue-darker"
                : "hover:underline mr-1 cursor-pointer"
            }
            onClick={() => (this.selected = CUTTER)}
          >
            Cutters
          </span>
        </div>
        {displayFilter(this.selected, players, this.handlers, this.cutters)}
      </div>
    );
  }
};
</script>
