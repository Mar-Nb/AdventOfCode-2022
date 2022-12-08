
bash = []
with open("input.txt") as f:
    for i in f:
        bash.append(i.split())

root = {"name": "/", "type": "d"}
current = None
path = []
for i in bash:
    if i[0] == "$": # if instruction
        if i[1] == "cd": # change dir
            if i[2] == "/": # goto root
                current = root
            elif i[2] == "..": # goto parent dir
                current = path.pop() 
            else:
                path.append(current)
                current = current[i[2]]
    elif i[0] == "dir": # if dir
         current[i[1]] = {"name": i[1], "type": "d"}
    else: # if file
        current[i[1]] = {"name": i[1], "type": "f", "size": int(i[0])}

def get_size(n):
    if n["type"] == "f": # if file
        return n["size"] # return size
    return sum(get_size(v) for k, v in n.items() if k != 'name' and k != 'type')


def size_list(path, all_sizes):
    all_sizes.append(get_size(path))
    for k, v in path.items():
        if k != 'name' and k != 'type' and v["type"] == "d":
            size_list(v, all_sizes)

sizes = []
size_list(root, sizes)
p1 = 0
for i in sizes:
    if i < 100000: # if dir size < 100k
        p1+=i

print(p1)
print(root)

size_free = 70000000 - sizes[0]
for p2 in sorted(sizes):
    if size_free + p2 >= 30000000:
        print(p2)
        break
