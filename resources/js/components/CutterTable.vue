<script>
export default {
  props: ["cutters"],
  render() {
    return (
      <div>
        {Object.keys(this.cutters).map(cutter => (
          <p>
            {this.cutters[cutter].name} - {this.cutters[cutter].number} -{" "}
            {this.cutters[cutter].gender}
          </p>
        ))}
      </div>
    );
  }
};
</script>
