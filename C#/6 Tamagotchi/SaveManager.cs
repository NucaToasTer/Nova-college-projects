using System.Text.Json;

namespace boilerplate;

/// <summary>
/// Handles reading and writing SaveData to disk.
///   - _build_path  →  SavePath property
///   - _load_impl   →  Load()
///   - save()       →  Save()
/// </summary>
public static class SaveManager
{
    // Equivalent of ROOT_DIR = "user://save"
    // AppContext.BaseDirectory resolves to the project output folder (where the .exe lives)
    
    //  .exe version
    //Environment.GetFolderPath(Environment.SpecialFolder.ApplicationData),"boilerplate" for
   


    private static readonly string SaveDir = Path.Combine(
        AppContext.BaseDirectory, "saves"
    );

    // Equivalent of _build_path() — always "boilerplate/save.json"
    private static string SavePath => Path.Combine(SaveDir, "save.json");

    private static readonly JsonSerializerOptions JsonOpts = new() { WriteIndented = true };

    /// <summary>
    /// Load save from disk, or return a fresh instance if none exists.
    /// Mirrors _load_impl()
    /// </summary>
    public static SaveData Load()
    {
        if (!File.Exists(SavePath))
            return new SaveData(); // no file → fresh save, same as Godot's "return instance"

        try
        {
            string json = File.ReadAllText(SavePath);
            return JsonSerializer.Deserialize<SaveData>(json) ?? new SaveData();
        }
        catch
        {
            // Corrupt file — start fresh rather than crashing
            return new SaveData();
        }
    }

    /// <summary>
    /// Write current save data to disk.
    /// </summary>
    public static void Save(SaveData data)
    {
        Directory.CreateDirectory(SaveDir); // equivalent of make_dir_recursive_absolute
        data.LastWrite = DateTime.UtcNow;   // equivalent of last_write = Time.get_unix_time_from_system()
        File.WriteAllText(SavePath, JsonSerializer.Serialize(data, JsonOpts));
    }

    /// <summary>
    /// Delete the save file entirely.
    /// </summary>
    public static void Wipe()
    {
        if (File.Exists(SavePath))
            File.Delete(SavePath);
    }
}