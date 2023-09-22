# Read the input file
with open('other/list_material_icons.txt', 'r') as file:
    lines = file.readlines()

# Function to format each line
def format_line(line):
    parts = line.strip().split()
    if len(parts) == 2:
        return parts[0] + '\n'
    else:
        return line

# Format each line
formatted_lines = [format_line(line) for line in lines]

# Write the formatted lines to a new file
with open('other/list_material_icons_f.txt', 'w') as file:
    file.writelines(formatted_lines)
