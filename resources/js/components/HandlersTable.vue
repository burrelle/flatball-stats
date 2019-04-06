<script>
export default {
  props: ["handlers"],
  render() {
    return (
      <div>
        {Object.keys(this.handlers).map(handler => (
          <p>
            {this.handlers[handler].name} - {this.handlers[handler].number} -{" "}
            {this.handlers[handler].gender}
          </p>
        ))}
      </div>
    );
  }
};
</script>
