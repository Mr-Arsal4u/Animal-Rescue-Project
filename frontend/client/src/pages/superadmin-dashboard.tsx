import { motion } from "framer-motion";
import { Shield, Users, PawPrint, BarChart3, Settings, LogOut } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { fadeInUp, staggerContainer } from "@/lib/animations";

export default function SuperAdminDashboard() {
  const handleLogout = async () => {
    try {
      await fetch("/api/superadmin/logout", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute("content") || "",
        },
        credentials: "include",
      });
      window.location.href = "/superadmin/login";
    } catch (error) {
      console.error("Logout failed:", error);
    }
  };

  const stats = [
    {
      title: "Total Animals",
      value: "156",
      description: "Animals in our care",
      icon: PawPrint,
      color: "text-blue-600",
      bgColor: "bg-blue-50",
    },
    {
      title: "Adoptions",
      value: "89",
      description: "Successful adoptions",
      icon: Users,
      color: "text-green-600",
      bgColor: "bg-green-50",
    },
    {
      title: "Volunteers",
      value: "24",
      description: "Active volunteers",
      icon: Shield,
      color: "text-purple-600",
      bgColor: "bg-purple-50",
    },
    {
      title: "Donations",
      value: "$12,450",
      description: "This month",
      icon: BarChart3,
      color: "text-orange-600",
      bgColor: "bg-orange-50",
    },
  ];

  return (
    <div className="min-h-screen bg-gray-50">
      {/* Header */}
      <header className="bg-white shadow-sm border-b">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center py-4">
            <div className="flex items-center space-x-3">
              <div className="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                <Shield className="w-6 h-6 text-white" />
              </div>
              <div>
                <h1 className="text-xl font-semibold text-gray-900">Super Admin Dashboard</h1>
                <p className="text-sm text-gray-500">Rescue The Voiceless</p>
              </div>
            </div>
            <div className="flex items-center space-x-4">
              <Button variant="outline" size="sm">
                <Settings className="w-4 h-4 mr-2" />
                Settings
              </Button>
              <Button variant="outline" size="sm" onClick={handleLogout}>
                <LogOut className="w-4 h-4 mr-2" />
                Logout
              </Button>
            </div>
          </div>
        </div>
      </header>

      {/* Main Content */}
      <main className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <motion.div
          initial="initial"
          animate="animate"
          variants={staggerContainer}
        >
          {/* Welcome Section */}
          <motion.div variants={fadeInUp} className="mb-8">
            <h2 className="text-2xl font-bold text-gray-900 mb-2">
              Welcome back, Super Admin! 👋
            </h2>
            <p className="text-gray-600">
              Here's what's happening with your rescue organization today.
            </p>
          </motion.div>

          {/* Stats Grid */}
          <motion.div
            variants={fadeInUp}
            className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8"
          >
            {stats.map((stat, index) => (
              <Card key={stat.title} className="border-0 shadow-sm">
                <CardContent className="p-6">
                  <div className="flex items-center justify-between">
                    <div>
                      <p className="text-sm font-medium text-gray-600">{stat.title}</p>
                      <p className="text-2xl font-bold text-gray-900">{stat.value}</p>
                      <p className="text-xs text-gray-500">{stat.description}</p>
                    </div>
                    <div className={`w-12 h-12 rounded-lg flex items-center justify-center ${stat.bgColor}`}>
                      <stat.icon className={`w-6 h-6 ${stat.color}`} />
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </motion.div>

          {/* Quick Actions */}
          <motion.div variants={fadeInUp} className="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <Card className="border-0 shadow-sm">
              <CardHeader>
                <CardTitle className="flex items-center">
                  <PawPrint className="w-5 h-5 mr-2 text-primary" />
                  Animal Management
                </CardTitle>
                <CardDescription>
                  Manage animals, view adoption applications, and update statuses
                </CardDescription>
              </CardHeader>
              <CardContent>
                <div className="space-y-3">
                  <Button className="w-full justify-start" variant="outline">
                    View All Animals
                  </Button>
                  <Button className="w-full justify-start" variant="outline">
                    Pending Applications
                  </Button>
                  <Button className="w-full justify-start" variant="outline">
                    Add New Animal
                  </Button>
                </div>
              </CardContent>
            </Card>

            <Card className="border-0 shadow-sm">
              <CardHeader>
                <CardTitle className="flex items-center">
                  <Users className="w-5 h-5 mr-2 text-primary" />
                  User Management
                </CardTitle>
                <CardDescription>
                  Manage volunteers, staff, and user accounts
                </CardDescription>
              </CardHeader>
              <CardContent>
                <div className="space-y-3">
                  <Button className="w-full justify-start" variant="outline">
                    View All Users
                  </Button>
                  <Button className="w-full justify-start" variant="outline">
                    Manage Permissions
                  </Button>
                  <Button className="w-full justify-start" variant="outline">
                    Add New User
                  </Button>
                </div>
              </CardContent>
            </Card>
          </motion.div>

          {/* Recent Activity */}
          <motion.div variants={fadeInUp} className="mt-8">
            <Card className="border-0 shadow-sm">
              <CardHeader>
                <CardTitle>Recent Activity</CardTitle>
                <CardDescription>
                  Latest updates and activities in your organization
                </CardDescription>
              </CardHeader>
              <CardContent>
                <div className="space-y-4">
                  {[
                    { action: "New adoption application received", time: "2 minutes ago", type: "adoption" },
                    { action: "Volunteer Sarah completed training", time: "1 hour ago", type: "volunteer" },
                    { action: "Donation of $500 received", time: "3 hours ago", type: "donation" },
                    { action: "New animal 'Luna' added to system", time: "5 hours ago", type: "animal" },
                  ].map((activity, index) => (
                    <div key={index} className="flex items-center space-x-3 p-3 rounded-lg bg-gray-50">
                      <div className="w-2 h-2 bg-primary rounded-full"></div>
                      <div className="flex-1">
                        <p className="text-sm font-medium text-gray-900">{activity.action}</p>
                        <p className="text-xs text-gray-500">{activity.time}</p>
                      </div>
                    </div>
                  ))}
                </div>
              </CardContent>
            </Card>
          </motion.div>
        </motion.div>
      </main>
    </div>
  );
} 