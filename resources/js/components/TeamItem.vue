<script>
export default {
  props: ["team"],
  render() {
    const { id, name, type } = this.team;
    return (
      <div>
        <a href={`/teams/${id}`}>{name}</a> - {type} {this.$slots.default}
      </div>
    );
  }
};
</script>
