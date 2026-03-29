using System.Text.Json;

namespace boilerplate;

public static class SaveManager
{
    private static readonly string SaveDir = Path.Combine(
        AppContext.BaseDirectory, "saves"
    );

    private static string SavePath => Path.Combine(SaveDir, "save.json");

    private static readonly JsonSerializerOptions JsonOpts = new() { WriteIndented = true };

    public static SaveData Load()
    {
        if (!File.Exists(SavePath))
            return new SaveData();

        try
        {
            string json = File.ReadAllText(SavePath);
            return JsonSerializer.Deserialize<SaveData>(json) ?? new SaveData();
        }
        catch
        {
            return new SaveData();
        }
    }

    public static void Save(SaveData data)
    {
        Directory.CreateDirectory(SaveDir);
        data.LastWrite = DateTime.UtcNow;
        File.WriteAllText(SavePath, JsonSerializer.Serialize(data, JsonOpts));
    }

    public static void Wipe()
    {
        if (File.Exists(SavePath))
            File.Delete(SavePath);
    }
}
