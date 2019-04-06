<script>
export default {
  props: ["players"],
  render() {
    return (
      <div>
        {this.players.map(({ name, number, gender }) => (
          <p>
            {name} - {number} - {gender}
          </p>
        ))}
      </div>
    );
  }
};
</script>
