namespace boilerplate;

public class SaveData
{
    public List<string> scores { get; set; } = new();
    public DateTime LastWrite { get; set; } = DateTime.MinValue;
}
