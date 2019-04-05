<script>
export default {
  data: () => ({
    selected: "all"
  }),
  props: ["fullteam", "cutters", "handlers"],
  render() {
    const displayFilter = (selected, players, handlers, cutters) => {
      switch (selected) {
        case "all":
          return players.map(({ name, number, gender }) => (
            <p>
              {name} - {number} - {gender}
            </p>
          ));
        case "handler":
          return Object.keys(handlers).map(handler => (
            <p>
              {handlers[handler].name} - {handlers[handler].number} -{" "}
              {handlers[handler].gender}
            </p>
          ));
        case "cutter":
          return Object.keys(cutters).map(cutter => (
            <p>
              {cutters[cutter].name} - {cutters[cutter].number} -{" "}
              {cutters[cutter].gender}
            </p>
          ));
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
</style>
